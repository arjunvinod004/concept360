<?php
class Enquirymodel extends CI_Model {
	
	public function getEnquiryCount() {
        $this->db->select('id'); // Select only the store_product_id
        $this->db->from('tbl_enquiry'); // Your table name
        return $this->db->count_all_results(); 
    }


	public function get_enquiries($company_id){
		$this->db->select('*');
		$this->db->where('is_approved', 0);
		$this->db->where('company_id', $company_id);
		$this->db->from('tbl_enquiry');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		// echo $this->db->last_query();  
		return $query->result_array();
	}

	public function insert_enquiry($data) {
		$this->db->insert('tbl_enquiry', $data);
		// Check if both visitor_name and email exist

	}



	public function approved_enquiry($id, $company_id) {
			$this->db->where('id', $id);
		$this->db->where('company_id', $company_id);
		$this->db->update('tbl_enquiry', array('is_approved' => 1));
	}


	public function approved_enquiry_details($company_id) {
		// $this->db->where('id', $id);
		$this->db->where('company_id', $company_id);
		$this->db->where('is_approved', 1);
		$this->db->from('tbl_enquiry');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		// echo $this->db->last_query();  
		return $query->result_array();
	}
	

	public function getEnquiryDetailsById($id, $company_id) {
	
		// Fetch updated record from `tbl_enquiry`
		$this->db->select('*');  // Select all columns
		$this->db->from('tbl_enquiry');
		$this->db->where('id', $id);
		$this->db->where('company_id', $company_id);
		$query = $this->db->get();
		return $query->row_array();  // Return a single record as an array
	}
	

// 	public function getEnquiryDetailsById($id,$company_id){
// 		$this->db->where('id', $id);
// $this->db->where('company_id', $company_id);
// $this->db->from('company_name');
// $this->db->update('tbl_enquiry', array('is_read' => 1)); 
// 		$this->db->select('
//     tblenq.*,
// 	tblcomp.*
// ');
// $this->db->from('tbl_enquiry tblenq');
// $this->db->join('tbl_company tblcomp', 'tblenq.company_id = tblcomp.n_id', 'left');
// $this->db->where('tblenq.id', $id);
// $this->db->where('tblenq.company_id', $company_id);
// // $this->db->where()
// $query = $this->db->get();//echo $this->db->last_query();exit;
// $row = $query->row_array(); //print_r($row);exit;
// return $row;
// 	}


	public function update_enquiry_details($data,$product_id){
        $this->db->where('id', $product_id);
        $this->db->update('tbl_enquiry', $data);
        // echo $this->db->last_query();
    }


	public function delete_enquiry($id) {
		$this->db->where('id', $id);
		$this->db->delete('tbl_enquiry');
	}
  

	public function get_unread_count($company_id) {
		$this->db->select('*');
		$this->db->where('is_approved', 0);
		$this->db->where('company_id', $company_id);
		$this->db->from('tbl_enquiry');
		$query = $this->db->get();
		return $query->num_rows();
	}


		public function get_completed_count($company_id) {
		$this->db->select('*');
		$this->db->where('is_approved', 1);
		$this->db->where('company_id', $company_id);
		$this->db->from('tbl_enquiry');
		$query = $this->db->get();
		return $query->num_rows();
	}





public function search_enquiry($search, $company_id) {
    $this->db->select('*');
    $this->db->from('tbl_enquiry');
    
    if (!empty($search)) {
        $this->db->group_start();
            $this->db->like('task_name', $search);
            $this->db->or_like('purpose_of_visit', $search);
            $this->db->or_like('date', $search);
        $this->db->group_end();
    }

    $this->db->where('company_id', $company_id);
    
    $query = $this->db->get();
    return $query->result_array(); // ✅ make sure you return the results
}


	




	public function delete_update_assigned_products($store_id,$category_id,$selected_items){
		foreach ($selected_items as $product_id) {
			// echo $store_id;echo $product_id;
			$this->db->where('store_id', $store_id);
			$this->db->where('product_id', $product_id);
			$query = $this->db->get('store_wise_product_assign');
			if($query->num_rows() == 0){
					$product_details = $this->get_product_by_id($product_id);//print_r($product_details);exit;
					$vat_id = $this->get_store_vat_id($store_id);//exit;
					$tax_rate = $this->get_store_tax_rate($vat_id[0]['gst_or_tax']);
					$data = array(
					'store_id' => $store_id,
					'product_id' => $product_id,
					'subcategory_id' => $product_details[0]['subcategory_id'],
					'vat_id' => $vat_id[0]['gst_or_tax'],
					'type' => $product_details[0]['product_veg_nonveg'],
					'rate' => '',
					'tax' => $tax_rate,
					'tax_amount' => '',
					'total_amount' => '',
					'category_id' => $product_details[0]['category_id'],
					'is_addon' => $product_details[0]['is_addon'],
					'is_customizable' => $product_details[0]['is_customizable'],
					'image' => '',
					'is_admin'	=> 1, //when added by admin thiw will 1
					'date_created' => date('Y-m-d H:i:s'), // current date and time
					'created_by' => 'admin',
					'date_modified' => date('Y-m-d H:i:s'),
					'modified_by' => 'admin',
					'is_active' => 1
				);
			$this->db->insert('store_wise_product_assign', $data);
			}
		}
	}

	public function update_selected_products($store_product_id, $updateData){
		$this->db->where('store_product_id', $store_product_id);
        return $this->db->update('store_wise_product_assign', $updateData);
	}

	public function update_selected_variants($varient_id,$store_id,$store_product_id,$updateData){	
		$this->db->where('variant_id', $varient_id);
		$this->db->where('store_id', $store_id);
		$this->db->where('store_product_id', $store_product_id);
        return $this->db->update('store_variants', $updateData);
	}

	public function update_selected_recipe($recipe_id,$store_id,$store_product_id,$updateData){	
		$this->db->where('recipe_id', $recipe_id);
		$this->db->where('store_id', $store_id);
		$this->db->where('store_product_id', $store_product_id);
        return $this->db->update('store_recipe', $updateData);
	}

	public function insert_variant($data) {
		$this->db->insert('store_variants', $data);
	}
	public function insert_recipe($data) {
		$this->db->insert('store_recipe', $data);
	}
	public function insert_addons($data) {
		$this->db->insert('products_addons', $data);
	}

	public function insert_product_assign($data) {
		$this->db->insert('store_wise_product_assign', $data);
	}


    public function update_categories($id, $data) {
        $this->db->where('category_id', $id);
        $this->db->update('categories', $data);
        return true;
    }


public function update_subcategories($id, $data) {
        $this->db->where('subcategory_id', $id);
        $this->db->update('subcategories', $data);
        return true;
    }
	public function update_product($id, $data) {
        $this->db->where('product_id', $id);
        $this->db->update('product', $data);
        return true;
    }

    public function delete_category($id){
		$this->db->where('category_id', $id);
        return $this->db->delete('categories');
	}

    public function get_categories_by_id($id){
	    $this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}

    public function insert_categories_translation($data) {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function check_categorycode_exists($code)
	{
    	$this->db->where('category_code', $code);
    	$query = $this->db->get('categories'); // Assuming 'users' is your table name
		if ($query->num_rows() > 0) {
        	return TRUE;  // Username exists
    	} else {
        	return FALSE;  // Username does not exist
    	}
	}

	public function check_categoryname_exists($catname)
	{
		$catname = $this->db->escape($catname); // Escaping the variable to prevent SQL injection
		$store_id = $this->session->userdata('logged_in_store_id');
		$query = "SELECT `category_name_en` FROM `categories` WHERE `category_name_en` = $catname AND (`store_id` = $store_id OR `store_id` = 0)";
		$result = $this->db->query($query);
		// Fetch and display results
		if ($result->num_rows() > 0) {
        	return TRUE;  // Username exists
    	} else {
        	return FALSE;  // Username does not exist
    	}
	}
    public function check_categoryorder_exists($order)
	{
    	$this->db->where('order_index', $order);
    	$query = $this->db->get('categories'); // Assuming 'users' is your table name
		if ($query->num_rows() > 0) {
        	return TRUE;  // Username exists
    	} else {
        	return FALSE;  // Username does not exist
    	}
	}

public function updateAddonStatus($addon_id, $is_active)
	{
		$data = ['is_active' => $is_active];
		$this->db->where('addon_id', $addon_id);
		return $this->db->update('products_addons', $data); // Replace 'addons' with your actual table name
	}
	
	public function get_product_by_id($id){
	    $this->db->select('*');
		$this->db->from('product');
		$this->db->where('product_id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getStoreWiseProductproductById($product_id) {
		$this->db->select('*');
		$this->db->from('store_wise_product_assign');
		$this->db->where('store_product_id', $product_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_owner_product_by_id($id){
		$query = $this->db->query("SELECT p.*, swpa.rate, swpa.tax_amount, swpa.total_amount, p.image as product_image
    FROM product as p
    LEFT JOIN store_wise_product_assign as swpa ON p.product_id = swpa.product_id
    WHERE p.product_id = $id");

return $query->result_array();


	}
	public function updateStoreProductPrice($id,$dataUpdate,$store_id){
	$this->db->where('product_id', $id);
	$this->db->where('store_id', $store_id);
	$this->db->update('store_wise_product_assign', $dataUpdate );
}



	//INCLUDING SHOP OWNER DATAS
	public function liststorecategories($store_id, $logged_in_store_id) {
		$ids = [$store_id, $logged_in_store_id];
		$query = $this->db->where_in('store_id', $ids)->get('categories');
		return $query->result_array();
	}

	public function already_assigned_products_ids($store_id){ 
		$this->db->select('product_id');
		$this->db->from('store_wise_product_assign');
		$this->db->where('store_id',$store_id ); 
		$query = $this->db->get();
		$products = $query->result_array();
		return $product_ids = array_column($products, 'product_id');
	}

	public function already_assigned_variant_ids($store_id,$product_id){ 
		$this->db->select('variant_id');
		$this->db->from('store_variants');
		$this->db->where('store_product_id',$product_id );
		$this->db->where('store_id',$store_id ); 
		$query = $this->db->get();
		$products = $query->result_array();
		return $variant_ids = array_column($products, 'variant_id');
	}

	public function already_assigned_recipe_ids($store_id,$product_id){
		$this->db->select('recipe_id');
		$this->db->from('store_recipe');
		$this->db->where('store_product_id',$product_id );
		$this->db->where('store_id',$store_id ); 
		$query = $this->db->get();
		$products = $query->result_array();
		return $recipe_ids = array_column($products, 'recipe_id');
	}


	public function shopAssignedProducts() {
		$store_id = $this->session->userdata('logged_in_store_id');
		$this->db->select('
			swpa.*,
			p.product_id,
			p.product_name_en,
			p.is_addon AS product_is_addon,
			p.is_customizable AS product_is_customizable,
			p.product_veg_nonveg,
			p.image,
			c.category_name_en,
			c.category_id,
			ss.pu_qty,
			ss.minqty,
			(ss.pu_qty - ss.sl_qty) AS balance_stock
		');
		$this->db->from('store_wise_product_assign AS swpa');
		$this->db->join('product AS p', 'p.product_id = swpa.product_id', 'left');
		$this->db->join('categories AS c', 'c.category_id = swpa.category_id', 'left');
		$this->db->join('store_stock AS ss', 'ss.product_id = p.product_id', 'left');
		$this->db->where('swpa.store_id', $store_id);
		$this->db->group_by('swpa.store_product_id');
		$query = $this->db->get();
		return $query->result_array(); // Return results as an array of objects
	}

	public function shopAssignedProductsbyPagination() {
        $store_id = $this->session->userdata('logged_in_store_id');
		$type = '';
		$products_by_category_active = [];
        $category_ids_order = $this->getAllCategoriesOrderByStore($store_id);
        foreach ($category_ids_order as $cat_order) {
               $category_id = $cat_order['category_id']; 
               $allproducts = $this->getAllProductsByStoreOrderByType($store_id, $category_id,$type);
               $products_by_category_active[$category_id] = $allproducts;
        }  
        $allproducts = array_merge_recursive($products_by_category_active);
        $inactiveProducts = [];
        $activeProducts = [];

        // Separate products by status
        foreach ($allproducts as $category_id => $products) {
            foreach ($products as $product) {
                if ($product['status'] == 0) {
                    $inactiveProducts[] = $product;
                } elseif ($product['status'] == 1) {
                    $activeProducts[] = $product;
                }
            }
        }
        // Merge the arrays
        $results = array_merge($inactiveProducts, $activeProducts);
        return $results;
    }

	public function getAllCategoriesOrderByStore($store_id){
        $this->db->select('category_id');
        $this->db->from('categories');
        $this->db->order_by('order_index', 'ASC');
        $query = $this->db->get();
        return $query->result_array(); 
    }

	public function getAllProductsByStoreOrderByType($store_id, $category_id , $type) {
        $this->db->select(
            's.product_id,
             s.store_product_id,
             s.is_active,
             s.availability,
             s.remarks,
             s.image as store_image,
             s.store_product_desc_en,
             s.store_product_name_en,
             s.store_product_desc_ma,
             s.store_product_name_ma,
             s.store_product_desc_hi,
             s.store_product_name_hi,
             s.store_product_desc_ar,
             s.store_product_name_ar,
             p.product_name_en,
             p.product_desc_en,
             p.product_name_ma,
             p.product_desc_ma,
             p.product_name_hi,
             p.product_desc_hi,
             p.product_name_ar,
             p.product_desc_ar,
             s.rate,
             p.is_customizable,
             p.image,
             p.product_veg_nonveg,
             p.category_id'
        ); 
        $this->db->from('store_wise_product_assign s');
        $this->db->join('product p', 'p.product_id = s.product_id'); 
        $this->db->where('s.store_id', $store_id);
        $this->db->where('s.category_id', $category_id);
        if ($type != '') {
            $this->db->where('p.product_veg_nonveg', $type);
        }
    
        $query = $this->db->get();
        $products = $query->result_array();
    
        $result = [];
    
        foreach ($products as $product) {
            //print_r($product);exit;
            if ($product['category_id'] == 23) {
                // Check stock for combo products
                $combo_items = $this->getComboItems($store_id,$product['store_product_id']);
                $combo_available = true;

                $availability = $this->getCurrentProductAvailability($product['store_product_id'],$store_id);
    
                if (empty($combo_items) || $availability == 1) {
                    $combo_available = false;
                }
                else
                {
                    foreach ($combo_items as $item) 
                    {
                        $stock = $this->getCurrentStock($item['item_id'], date('Y-m-d'), $store_id);
                        $availability = $this->getCurrentProductAvailability($item['item_id'],$store_id);
                        if ($stock < $item['quantity'] || $availability == 1)
                        {
                            $combo_available = false;
                            break;
                        }
                    }
                }
    
               
    
                // $product['status'] = $combo_available ? '0' : '1';
                $product['status'] = ($combo_available && $product['is_active'] == 0) ? '0' : '1';
            } else {
                // Check stock for individual products
                $stock1 = $this->getCurrentStock($product['store_product_id'], date('Y-m-d'), $store_id); 
                //$product['status'] = $stock > 0 ? '0' : '1';
                $product['status'] = ($stock1 > 0 && $product['is_active'] == 0 && $product['availability'] == 0) ? '0' : '1';
            }
    
            $result[] = $product;
        }
    
        return $result;
    }

	// public function shopAssignedProductsbyPagination($limit, $offset) {
    //     $store_id = $this->session->userdata('logged_in_store_id');
    //     $this->db->select('
    //         swpa.*,
    //         p.product_id,
    //         p.product_name_en,
    //         p.is_addon AS product_is_addon,
    //         p.is_customizable AS product_is_customizable,
    //         p.product_veg_nonveg,
    //         p.image as product_image,
    //         c.category_name_en,
    //         c.category_id,
    //         ss.pu_qty,
    //         ss.minqty,
    //         (ss.pu_qty - ss.sl_qty) AS balance_stock
    //     ');
    //     $this->db->from('store_wise_product_assign AS swpa');
    //     $this->db->join('product AS p', 'p.product_id = swpa.product_id', 'left');
    //     $this->db->join('categories AS c', 'c.category_id = swpa.category_id', 'left');
    //     $this->db->join('store_stock AS ss', 'ss.product_id = p.product_id', 'left');
    //     $this->db->where('swpa.store_id', $store_id);
    //     $this->db->group_by('swpa.store_product_id');
    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();
    //     $result = $query->result_array();
    //     return $result;
    // }


	
}
?>