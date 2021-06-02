<div class="container marketing">

<div id="carouselExampleSlidesOne" class="carousel slide supply-chain-risk-carousel" data-ride="carousel">
<?php if (has_post_thumbnail( $post->ID ) ): ?>  
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="carousel-item active">
      <!--img src="https://wordpress-567571-1831185.cloudwaysapps.com/wp-content/uploads/2021/04/rate_suppliers_bg.png" width="100%" height="auto" /-->
      <div class="row">
      <div class="col-sm-6 rate-suppliers-banner-text">
        <h1><?php the_field('supply_chain_risk_banner_header'); ?></h1>
        <p><?php the_field('supply_chain_risk_banner_subtitle'); ?></p>
      </div>
    </div>
      </div>
  </div>
<?php endif; ?>

<div class="row featurette rs-section">
<!--?php 
$loop = new WP_Query( 
    array( 
        'post_type' => 'supply_chain_risk',
        'posts_per_page' => 10 
        ) 
    ); 
 
while ( $loop->have_posts() ) : $loop->the_post();
 
?-->
 

  
 

    
<?php
                $post_category = get_the_terms( $post->ID , 'thought_leadership' );
                $post_date = get_the_date();

                /*$public_company_fhrs = echo 'Public Company FHRs';
                $private_company_fhrs = echo 'Private Company FHRs';
                $network_outreach = echo 'Network Outreach';
                $network_membership_program = echo 'Network Membership Program';
                $healthmark = echo 'HealthMark';
                $financial_dialogue = echo 'Financial Dialogue';
                $portfolio_risk_analysis = echo 'Porfolio Risk Analysis';
                $financial_benchmarking = echo 'Financial Benchmarking';
                $financial_data_entry = echo 'Financial Data Entry';*/

                $post_category = get_the_terms( $post->ID , 'supply_chain_risk' );
                $post_date = get_the_date();
        
            ?>



<?php
    //Valid options . A whitelist of allowed options.
    $riskOptions = array(
    'Learn about my suppliers',
    'Learn about my third parties',
    'Manage credit risk',
    'Choose the strongest suppliers',
    'Meet demands quickly',
    'Find new suppliers/third parties',
    'Improve my business relationships',
    'Mitigate disruption impact',
    );
    //Empty array by default.
    $options = array();
    //$check = false;
    //If the POST variable “vegetables” is a valid array.
    if(!empty($_POST['options']) && is_array($_POST['options'])){
        //Loop through the array of checkbox values.
        foreach($_POST['options'] as $option){
            //Make sure that this option is a valid one.
            if(in_array($option, $riskOptions)){
            //Add the selected options to our $vegetables array.
            $options[]=$option;
            //$check = true;
            }
        }
    }

    function search($array, $search_list) {
  
        // Create the result array
        $result = array();
      
        // Iterate over each array element
        foreach ($array as $key => $value) {
      
            // Iterate over each search condition
            foreach ($search_list as $k => $v) {
          
                // If the array element does not meet
                // the search condition then continue
                // to the next element
                if (!isset($value[$k]) || $value[$k] != $v)
                {
                      
                    // Skip two loops
                    continue 2;
                }
            }
          
            // Append array element's key to the
            //result array
            $result[] = $value;
        }
      
        // Return result 
        return $result;
    }
      
    // Multidimensional array for students list
    $arr = array(
        1 => array(
            'id' => 1,
            'name' => 'Learn about my suppliers',
            'section' => 'A',
            'content' => [
                'Public Company FHRs', 
                'Financial Dialogue', 
                'Financial Benchmarking'
            ]
        ),
        2 => array(
            'id' => 2,
            'name' => 'Learn about my third parties',
            'section' => 'B',
            'content' => [
                'Public Company FHRs', 
                'Private Company FHRs', 
                'Network Outreach', 
                'Network Membership Program', 
                'HealthMark', 
                'Financial Benchmarking', 
                'Financial Data Entry'
            ]
        ),
        3 => array(
            'id' => 3,
            'name' => 'Manage credit risk',
            'section' => 'C',
            'content' => [
                'Public Company FHRs',
                'Private Company FHRs',
                'Network Outreach',
                'Porfolio Risk Analysis',
                'Financial Benchmarking',
                'Financial Data Entry'
            ]
        ),
        4 => array(
            'id' => 4,
            'name' => 'Choose the strongest suppliers',
            'section' => 'D',
            'content' => [
                'Public Company FHRs',
                'Private Company FHRs',
                'Network Outreach',
                'Network Membership Program',
                'HealthMark',
                'Financial Dialogue',
                'Porfolio Risk Analysis',
                'Financial Benchmarking',
                'Financial Data Entry'
            ]
        ),
        5 => array(
            'id' => 5,
            'name' => 'Meet demands quickly',
            'section' => 'E',
            'content' => [
                'Public Company FHRs', 
                'Private Company FHRs', 
                'Network Outreach', 
                'Porfolio Risk Analysis', 
                'Financial Data Entry'
            ]
        ),
        6 => array(
            'id' => 6,
            'name' => 'Find new suppliers/third parties',
            'section' => 'F',
            'content' => [
                'Public Company FHRs',
                'Private Company FHRs',
                'Network Outreach',
                'Network Membership Program',
                'HealthMark',
                'Porfolio Risk Analysis',
                'Financial Data Entry'
            ]
        ),

        7 => array(
            'id' => 7,
            'name' => 'Improve my business relationships',
            'section' => 'G',
            'content' => [
                'Public Company FHRs', 
                'Private Company FHRs', 
                'Network Outreach', 
                'Network Membership Program',
                'HealthMark',
                'Financial Data Entry'
            ]
        ),

        8 => array(
            'id' => 8,
            'name' => 'Mitigate disruption impact',
            'section' => 'H',
            'content' => [
                'Public Company FHRs', 
                'Private Company FHRs', 
                'Network Outreach', 
                'Network Membership Program',
                'HealthMark',
                'Financial Data Entry'
            ]
        )
            
    );

      
    // Define search list with multiple key=>value pair
    $learn_about_my_suppliers = array('id'=>1, 'section'=> "A");
    $learn_about_my_third_parties = array('id'=>2, 'section'=> "B");
    $manage_credit_risk = array('id'=>3, 'section'=> "C");
    $choose_the_strongest_suppliers = array('id'=>4, 'section'=> "D");
    $meet_demands_quickly = array('id'=>5, 'section'=> "E");
    $find_new_suppliers_third_parties = array('id'=>6, 'section'=> "F");
    $improve_my_business_relationships = array('id'=>7, 'section'=> "G");
    $mitigate_disruption_impact = array('id'=>8, 'section'=> "H");
      
    // Call search and pass the array and
    // the search list
    //$res = search($arr, $demand);
    $search_id_1 = search($arr, $learn_about_my_suppliers);
    $search_id_2 = search($arr, $learn_about_my_third_parties);
    $search_id_3 = search($arr, $manage_credit_risk);
    $search_id_4 = search($arr, $choose_the_strongest_suppliers);
    $search_id_5 = search($arr, $meet_demands_quickly);
    $search_id_6 = search($arr, $find_new_suppliers_third_parties);
    $search_id_7 = search($arr, $find_new_suppliers_third_parties);
    $search_id_8 = search($arr, $find_new_suppliers_third_parties);

      
    // Print search result
    /*foreach ($res as $var) {
        foreach($var['content'] as $v){
            echo $v . '<br>';
        }
        
    }*/
    
  
    //var_dump($options);
    /*if($options[2] && $options[3]){
        echo 'Testing 123';
    }
    else{
        print $options;
    }*/
?>
<div class="col-md-12">
    <h2>What are you looking to do?</h2>
    <p>Select all that apply from below.</p>
</div>
<div class="col-md-12">
<form action="" method="post" id="productForm">
    <div class="row">
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Learn about my suppliers">
                <label>Learn about my suppliers<label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Learn about my third parties">
                <label>Learn about my third parties</label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Manage credit risk">
                <label>Manage credit risk</label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Choose the strongest suppliers">
                <label>Choose the strongest suppliers</label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Meet demands quickly">
                <label>Meet demands quickly<label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Find new suppliers/third parties">
                <label>Find new suppliers/third parties</label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Improve my business relationships">
                <label>Improve my business relationships<label>
            </div>
            <div class="col-md-3 select-options form-group">
                <input type="checkbox" name="options[]" value="Mitigate disruption impact">
                <label>Mitigate disruption impact</label>
            </div>
        
    </div>
    <!--button type="button" class="btn btn-primary price-calculator" data-toggle="collapse" data-target="#demo" value="submit">Submit</button-->
    <button type="submit" class="btn btn-primary price-calculator">Submit</button>


</form>
</div>


<div class="col-md-12">
    <!--?php
 
    
    
    /* Learn about my suppliers */
    if(in_array('Learn about my suppliers', $_POST['options'])){
        
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Financial Dialogue</li>";
        echo "<li>Financial Benchmarking</li>";
        echo "</ul>";

    }
 
    /* Learn about my third parties */
    else if(
        in_array('Learn about my third parties', $_POST['options'])
    ){

        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Membership Program</li>";
        echo "<li>HealthMark</li>";
        echo "<li>Financial Benchmarking</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";

    }

    /* Manage Credit Risk */
    if(in_array('Manage Credit Risk', $_POST['options'])){

        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Porfolio Risk Analysis</li>";
        echo "<li>Financial Benchmarking</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";

    }

    /* Choose the strongest suppliers */
    else if(
        in_array('Choose the strongest suppliers', $_POST['options'])
    ){
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Membership Program</li>";
        echo "<li>HealthMark</li>";
        echo "<li>Financial Dialogue</li>";
        echo "<li>Porfolio Risk Analysis</li>";
        echo "<li>Financial Benchmarking</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";

    }
    /* Meet demands quickly */
    else if(
        in_array('Meet demands quickly', $_POST['options']) 
    ){
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Porfolio Risk Analysis</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";

    }
    /* Find new suppliers/third parties */
    else if(
        in_array('Find new suppliers/third parties', $_POST['options'])
    ){
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Membership Program</li>";
        echo "<li>HealthMark</li>";
        echo "<li>Porfolio Risk Analysis</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";

    }
    /* Improve my business relationships */
    else if(
        in_array('Improve my business relationships', $_POST['options']) 
    ){
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Membership Program</li>";
        echo "<li>HealthMark</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";
        
    }

    /* Mitigate disruption impact */
    else if(
        in_array('Mitigate disruption impact', $_POST['options']) 
    ){
        echo "<ul>";
        echo "<li>Public Company FHRs</li>";
        echo "<li>Private Company FHRs</li>";
        echo "<li>Network Outreach</li>";
        echo "<li>Network Membership Program</li>";
        echo "<li>HealthMark</li>";
        echo "<li>Financial Data Entry</li>";
        echo "</ul>";
        
    }*
    
    ?-->
    <!--?php endwhile; ?-->
</div>


</div><!-- /.row -->

<?php
    if(!empty($_POST['options'])) {
        foreach($_POST['options'] as $check) {
                //echo $check; //echoes the value set in the HTML form for each checked checkbox.
                            //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                            //in your case, it would echo whatever $row['Report ID'] is equivalent to.
            $array = array();
            var_dump($array);
            $a = array_unique($array);
            var_dump($a);
            
            if($check === 'Learn about my suppliers'){
                foreach ($search_id_1 as $var) {
                    foreach($var['content'] as $v){
                        //echo $v . '<br>';
                        array_push($array, $v);
                    }
                }
            }
            if($check === 'Learn about my third parties'){
                foreach ($search_id_2 as $var) {
                    foreach($var['content'] as $v){
                        //echo $v . '<br>';
                        array_push($array, $v);
                    }
                }
            }

            if($check === 'Manage credit risk'){
                foreach ($search_id_3 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }

            if($check === 'Choose the strongest suppliers'){
                foreach ($search_id_4 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }

            if($check === 'Meet demands quickly'){
                foreach ($search_id_5 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }

            if($check === 'Find new suppliers/third parties'){
                foreach ($search_id_6 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }

            if($check === 'Improve my business relationships'){
                foreach ($search_id_7 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }

            if($check === 'Mitigate disruption impact'){
                foreach ($search_id_8 as $var) {
                    foreach($var['content'] as $v){
                        //var_dump($var['content']);
                        //echo $v . '<br>';
                        array_push($array, $v);
                        
                    }
                }
            }
            
            
            //var_dump($arr3);
            //var_dump($combined_array);
            //$full_arr = implode(array_unique(explode(',', $combined_array)));
            //$full_arr = $combined_array;
            //$full_arr = call_user_func_array("array_merge", $combined_array);
            //$full_arr = array_merge_recursive($combined_array);


            //var_export($full_arr);
            //$combined_array = array_unique(array_merge($arr1,$arr2), SORT_REGULAR);
            //var_dump($combined_array);
            //var_dump($arr1);
            //var_dump($arr2);
            //echo $arr2;
            //$count = count(array_intersect($arr1, $arr2));
            //var_dump($count);
            //var_dump($result);
            //$result1 = array_unique($result, SORT_REGULAR);
            //print_r($result1);
            //var_dump($result1);
           
            foreach($a as $value){
                
                $length = strlen($value);

                
                //$words = str_word_count($value, 1);
                //$count = array_count_values($words);
                //print_r($count);
                var_dump($value);
                    
                    //print_r($value);
                    /*$array_count = array_count_values($key); 
                    if (array_key_exists($item, $array_count) && ($array_count["$item"] > 1))
                    {
                    }*/
                
                    
                    //echo implode(',', array_unique(explode(',', $value)));
                
                //echo $key;
                //echo $value;
                //echo prev($value[2]);
                    /*if(  prev($value) ==  $length ){ 
                        echo $value; 
                    }else{
                        echo "Not Duplicate";
                    }*/
                    
                
                
                
                /*foreach (count_chars($value, 1) as $i => $val) {
                    echo $val;
                 }*/
                //$test = explode(',', $arr[0]);
                //$result1 = array_unique($arr, SORT_REGULAR);
                //var_dump($arr);
                //$test = array_unique($full);
                //echo $test;
                //echo $value . '<br>';
            }


        }
    }
?>


<div id="demo" class="row featurette rs-section panel-container collapse">
                                            <div class="col-md-6" style="margin-top: 20px;">
                                                <h2>Your RapidRatings program</h2>
                                                <p style="font-size: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Name</label>
                                                        <input type="text" class="form-control" placeholder="First name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Business Email</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" style="background:#3B4043;">Talk to our team</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6 recommended-solutions" style="margin-top: 20px;">
                                                <h2>Recommended Solutions</h2>
                                                <ul>
                                                    <?php
                                                    /* Learn about my suppliers */
                                                    if(in_array('Learn about my suppliers', $_POST['options'])){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Financial Dialogue</li>";
                                                        echo "<li>Financial Benchmarking</li>";
                                                    }
                                                    /* Choose the strongest suppliers */
                                                    else if(
                                                        in_array('Choose the strongest suppliers', $_POST['options'])
                                                    ){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Private Company FHRs</li>";
                                                        echo "<li>Network Outreach</li>";
                                                        echo "<li>Network Membership Program</li>";
                                                        echo "<li>HealthMark</li>";
                                                        echo "<li>Financial Dialogue</li>";
                                                        echo "<li>Porfolio Risk Analysis</li>";
                                                        echo "<li>Financial Benchmarking</li>";
                                                        echo "<li>Financial Data Entry</li>";

                                                    }
                                                    /* Meet demands quickly */
                                                    else if(
                                                        in_array('Meet demands quickly', $_POST['options']) 
                                                    ){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Private Company FHRs</li>";
                                                        echo "<li>Network Outreach</li>";
                                                        echo "<li>Porfolio Risk Analysis</li>";
                                                        echo "<li>Financial Data Entry</li>";

                                                    }
                                                    /* Find new suppliers/third parties */
                                                    else if(
                                                        in_array('Find new suppliers/third parties', $_POST['options'])
                                                    ){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Private Company FHRs</li>";
                                                        echo "<li>Network Outreach</li>";
                                                        echo "<li>Network Membership Program</li>";
                                                        echo "<li>HealthMark</li>";
                                                        echo "<li>Porfolio Risk Analysis</li>";
                                                        echo "<li>Financial Data Entry</li>";

                                                    }
                                                    /* Improve my business relationships */
                                                    else if(
                                                        in_array('Improve my business relationships', $_POST['options']) 
                                                    ){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Private Company FHRs</li>";
                                                        echo "<li>Network Outreach</li>";
                                                        echo "<li>Network Membership Program</li>";
                                                        echo "<li>HealthMark</li>";
                                                        echo "<li>Financial Data Entry</li>";

                                                        
                                                    }

                                                    /* Mitigate disruption impact */
                                                    else if(
                                                        in_array('Mitigate disruption impact', $_POST['options']) 
                                                    ){
                                                        echo "<li>Public Company FHRs</li>";
                                                        echo "<li>Private Company FHRs</li>";
                                                        echo "<li>Network Outreach</li>";
                                                        echo "<li>Network Membership Program</li>";
                                                        echo "<li>HealthMark</li>";
                                                        echo "<li>Financial Data Entry</li>";
                                                        
                                                    }
                                                    else{
                                                        echo "Incorrect Selection";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
    </div><!-- /.row -->
</div>

