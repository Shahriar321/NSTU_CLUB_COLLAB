
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
                <td>
                  <ul class="list-unstyled mb-0 d-flex justify-content-end"> 

                   <li class="nav-item dropdown">
                    <a  class="dropdown-toggle d-flex align-items-center hidden-arrow"href="#"id="navbarDropdownMenuAvatar"role="button"data-bs-toggle="dropdown"  aria-expanded="false">
                     <i class="fas fa-pencil-alt"></i></a> 
             
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar" >
                         <li>
                             <a class="dropdown-item" href="managememberaction.php?makeadmin=1  &&  user_id=<?php echo $userm_id; ?> &&  member_type=<?php echo $member_type; ?>">Make Admin</a>
                         </li>
                         
                         <li>
                             <a class="dropdown-item" href="managememberaction.php?makemember=1  &&  user_id=<?php echo $userm_id; ?> &&   member_type=<?php echo $member_type; ?>">Make Member</a>
                        </li>
                    </ul>
                   </li> 

                   <li><a href="managememberaction.php?deletemember=1  &&  user_id=<?php echo $userm_id; ?>  &&  user_id=<?php echo $userm_id; ?> &&   member_type=<?php echo $member_type; ?>" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                  </ul>
                </td>
              </tr> 