<?php 
   include("inc/header.php"); 
   include("inc/body.php"); 
?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Comments / Viewers</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                           <div class="iq-custom-select d-inline-block sea-epi s-margin">
                              <select name="cars" class="form-control season-select">
                                 <option value="season1">Most Likely</option>
                                 <option value="season2">Unlikely</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table movie_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:20%;">Movie</th>
                                    <th style="width:10%;">Rating</th>
                                    <th style="width:20%;">Category</th>
                                    <th style="width:10%;">Download/Views</th>
                                    <th style="width:10%;">User</th>
                                    <th style="width:20%;">Date</th>
                                    <th style="width:10%;"><i class="lar la-heart"></i></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="images/movie-thumb/01.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Champions</p>
                                             <small>1h 40m</small>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 9.2</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>21 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td >
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="images/show-thumb/05.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Last Race</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 7.2</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>subcriber</td>
                                    <td>22 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="images/show-thumb/07.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Boop Bitty</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.2</td>
                                    <td>Thriller</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>23 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="images/show-thumb/10.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Dino Land</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.5</td>
                                    <td>Action</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>24 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="images/show-thumb/04.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">The Last Breath</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.9</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>subcriber</td>
                                    <td>25 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
<?php 
include("inc/footer.php"); 
include("inc/script.php"); 
?>