<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Tambah Project</h2>

    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
      <a href="index.html"><i class="fa fa-home"></i> Home</a>
      <!-- Divider -->
      <span class="divider">/</span>
      <a href="#" class="bread-current">Project</a>
    </div>

    <div class="clearfix"></div>

  </div>
  <!-- Page heading ends -->


  <!-- Matter -->

  <section class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12 registration-detail" >
          <?= $this->Form->create($project, ['enctype' => 'multipart/form-data']) ?>
          <fieldset class="well">
              <?php
                  echo $this->Form->input('name');
                  echo $this->Form->input('body',array('label'=>'Deskripsi'));
                  echo $this->Form->input('logo',array('type'=>'file'));
                  echo $this->Form->input('image',array('type'=>'file'));
                  echo $this->Form->input('filename',array('type'=>'file','label'=>'Svg'));
                  echo $this->Form->input('latitude');
                  echo $this->Form->input('longitude');
              ?>
          </fieldset>
          <fieldset class="well" >
            <h2><?php echo __('Image');?></h2>
            <table id="image-table" class="table">
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td colspan="7"></td>
                        <td class="actions">
                            <a href="#" class="add">Tambah Unit</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </fieldset>
        <script id="image-template" type="text/x-underscore-template" >
          <?php echo $this->element('images');?>
      </script>
          <fieldset class="well" >
            <h2><?php echo __('Unit');?></h2>
            <table id="grade-table" class="table">
                <thead>
                    <tr>
                        <th>Type Unit</th>
                        <th>Spesifikasi</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Booking Fee</th>
                        <th>Down Payment (%)</th>
                        <th>Tersedia (unit)</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td colspan="7"></td>
                        <td class="actions">
                            <a href="#" class="add">Tambah Unit</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </fieldset>
        <script id="grade-template" type="text/x-underscore-template" >
          <?php echo $this->element('grades');?>
      </script>
          <?= $this->Form->button(__('Submit')) ?>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
  </section>

<!-- Matter ends -->
</div>

<style>
.registration-detail{
  text-align:left;
}
.registration-detail input {
    text-align:left;
    margin-bottom: 20px;
}
.registration-detail label {
    padding-right:90px;
    width:200px
}
.registration-detail button {
    text-align:center;
}

</style>
<script>
$(document).ready(function() {
    var
        gradeTable = $('#grade-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#grade-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
});
</script>
<script>
$(document).ready(function() {
    var
        imageTable = $('#image-table'),
        imageBody = imageTable.find('tbody'),
        imageTemplate = _.template($('#image-template').remove().text()),
        numberRows = imageTable.find('tbody > tr').length;

    imageTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(imageTemplate({key: numberRows++}))
                .hide()
                .appendTo(imageBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            imageTable.find('a.add').click();
        }
});
</script>
