
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl" style="margin-bottom:100px;">
          <!-- Page title -->
          <div class="page-header">
            <div class="d-flex justify-content-between">
            <div class="d-flex">
              <div>
                <img class="" style="width:175px; border-radius:50%;" src="https://sld.bumalati.com/assets/img/<?= $subordinate['KAR_PHOTO']?>" alt="<?= $subordinate['KAR_PHOTO']?>">
              </div>
              <div class="px-4">
                <div class="pt-4 pb-3">
                  <h2 style="margin-bottom:-2px"><?= $subordinate['KAR_NAME']?></h2>
                </div>
               
                <div>
                  <span><strong>NIK : </strong><?= $subordinate['KAR_NIK']?></span><br>
                  <span><strong>Position : </strong><?= $subordinate['JAB_NAME']?></span><br>
                  <span><strong>Section : </strong><?= $subordinate['SEC_NAME']?></span><br>
                  <?php if($direct['KAR_NAME'] == '') : ?>
                    <span><strong>Direct : </strong> - </span>
                  <?php else : ?>
                    <span><strong>Direct : </strong><?=$direct['KAR_NAME'];?></span>
                  <?php endif ; ?>
                </div>
              </div>
            </div>
            <div class="mx-4">
              <?php if($subordinate['employeeStatus'] == 'Ya') :?>
                <p class="bg-yellow px-3 py-2 rounded"> Active </p>
              <?php else :?>
                <p class="bg-danger px-3 py-2 rounded"> Inactive </p>
              <?php endif;?>
            </div>
          </div>
           <hr>
          <div class="d-flex justify-content-evenly">
            <div>
              <div class="d-flex justify-content-around">
                <div>
                  <h1>4</h1>
                </div>
              </div>
              <div>
                <h3>Self Learnings</h3>
              </div>
            </div>
            <div>
              <div class="d-flex justify-content-around">
                <div>
                  <h1>4</h1>
                </div>
              </div>
              <div>
                <h3>Special Tasks</h3>
              </div>
            </div>
            <div>
              <div class="d-flex justify-content-around">
                <div>
                  <h1>10/14</h1>
                </div>
              </div>
              <div>
                <h3>Observations</h3>
              </div>
            </div>
          </div>
          <hr>
          </div>
        </div>
     

       

       