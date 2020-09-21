<?php include '../dbconfig.php'; ?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <?php 
            $sql="SELECT des FROM temp_course_content WHERE id=".$_POST['id'];
            $result=mysqli_query($con, $sql);
            $row=mysqli_fetch_assoc($result);
            $ccontent=$row['des'];
          ?>
          <h5 class="modal-title">Add Lecture Content for: <?= $ccontent ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-lg-12 col-md-12">                             
              <div class="ui search focus mt-30 lbel25">
                <input type="hidden" name="id" id="cc_id" value="<?= $_POST['id'] ?>">
                <label>Lecture Title*</label>
                <div class="ui left icon input swdh19">
                  <input class="prompt srch_explore" type="text" placeholder="Insert your Lecture title." name="lecture_title" data-purpose="edit-course-title" maxlength="30" id="lecture_title_p" value="" required>
                  <div id="LTITLE" style="color:red; margin-left: 5px;"></div>
                  <button class="part_btn_save prt-sv" type="submit" id="save_lecture">Save Lecture Content</button>
                </div>
                <div id="lcdata">
                <?php
                $table="";
                $table="<table class='table ucp-table '>
                        <thead class='thead-s'>
                        <tr>
                          <th class='text-center' scope='col'>Sl.no</th>
                          <th class='cell-ta'>Course Cotent Title</th>
                          <th class='text-center' scope='col'>Action</th>
                        </tr>
                        </thead>
                        <tbody>";
                        $sql="SELECT * FROM  temp_lecture_title WHERE cc_id=".$_POST['id'];
                        $result=mysqli_query($con, $sql);
                        $i=0;
                        while($row=mysqli_fetch_assoc($result))
                        {   
                          $table.="<tr>";
                          $table.="<td class='text-center'>".++$i."</td>";
                          $table.="<td class='cell-ta'>".$row['des']."</td>";
                          $table.="<td class='text-center'><a href='#' onClick='editLectureTitle(".$row['id'].");' title='Edit'class='gray-s' id='addLectureTitle'><i class='uil uil-edit-alt'></i></a>";
                          $table.="<a href='#' onClick='deleteLectureContent(".$row['id'].");'  title='Delete' class='gray-s'><i class='uil uil-trash-alt'></i></a></td></tr>";
                        }
                        $table.="</tbody></table>";
                        echo $table;
                ?>
                </div>
              </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="closePopup">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $("#save_lecture").click(function() {
      var ltitle= $("#lecture_title_p").val();
      if(ltitle.isEmpty||ltitle.length==0||ltitle==null)
      {
          $("#LTITLE").html("Please Enter Lecture Content");
      return false;
      }
      else
    {
        var cc_id=$("#cc_id").val();
        $.ajax({
            type: "POST",
            url: "ajax/add_course_content_lecture_content.php?",
            data: "ltitle="+ltitle+"&type=lecture"+"&cc_id="+cc_id,
            success: function(data) {
              $("#lcdata").html(data);
            },
            error:function(data){
              alert(data+"fail");
            }

        });
    }
  });
    function deleteLectureContent(id){
      if (confirm('Are you sure ?')) {
        var cc_id=$("#cc_id").val();
        $.ajax({
          url:"ajax/deleteRows.php",
          type:"POST",
          data:"id="+id+"&wdel=lecture_content"+"&cc_id="+cc_id,
          success:function(data){
            $("#lcdata").html(data);
          },
          error:function(data){

          }
        });
        }
    }
  </script>