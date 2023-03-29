 <!-- -------------------------------------------shows payement of members for the month ---------------------------- -->
 
 
 
	 
		 <tbody>
                 <tr>
				    <td> 
                         <h4><?php echo $user_name; ?></h4>  
                         <p><?php echo  $user_dept; ?></p> 
                    </td>

					<td>
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="../images//<?php echo  $user_image; ?>" alt="avatar"  width="30" height="30" />
					</td>
						
					<td class="text-center">
						<p><?php echo  $payment_ammount; ?></p>
					</td>

                    <td class="text-center">
						<p> <?php echo  $transiction_number; ?></p>
					</td>

					<td class="text-center"> 
                        <p><?php echo  $payment_status; ?></p>
                    </td>


                    <td class="text-center">
                    <p><?php echo  $bkash_number; ?></p>
                    </td>
                    
                    <td class="text-center"> 
                     <?php if($payment_status=="not-checked"){?> 
                        <a href="checkedpayroll.php?payment_id=<?php echo  $payment_id; ?> &&  user_id=<?php echo  $userp_id; ?>" class=" btn-sm text-primary" style="text-decoration:none ;"><b>Mark Checked</b></a>
                    <?php }?> 
					</td>

				</tr>
            
		 
 