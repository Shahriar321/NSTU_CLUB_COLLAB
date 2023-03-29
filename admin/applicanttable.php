<?php  
$session_id=$_SESSION['form_session'];
?>
              <tr class="candidates-list">

<td class="title">
  <div class="thumb">
       <img class="rounded-circle shadow-1-strong me-3"
    src="../images//<?php echo  $user_image; ?>" alt="avatar"  width="30" height="30" /> 
  </div>
  <div class="candidate-list-details">
    <div class="candidate-list-info">
      <div class="candidate-list-title">
        <h5 class="mb-0"><a href="#"></a><?php echo  $user_name; ?></h5>
      </div> 
    </div>
  </div>
</td>

<td class="candidate-list-favourite-time text-center">
  <span class="candidate-list-time order-1"><?php echo  $user_dept; ?></span>
</td>

<td class="candidate-list-favourite-time text-center">
  <span class="candidate-list-time order-1"><?php echo  $user_type; ?></span>
</td>

<td class="candidate-list-favourite-time text-center">
  <span class="candidate-list-time order-1"><?php echo  $user_batch; ?></span>
</td> 
<td class="candidate-list-favourite-time text-center">
  <span class="candidate-list-time order-1"><?php echo  $pay_number; ?></span>
</td> 
<td>
  <ul class="list-unstyled mb-0 d-flex justify-content-end">   

   <li><a href="applicantaction.php?addmember=1  &&  user_id=<?php echo $userm_id; ?> $&  session_id=<?php echo  $session_id; ?>" class="text-primary" data-toggle="tooltip" title="" data-original-title="add"><i class="fa-solid fa-plus"></i></a></li>
  </ul>
</td>
</tr> 