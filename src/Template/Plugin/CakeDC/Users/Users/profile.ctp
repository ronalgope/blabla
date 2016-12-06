<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="profile-users row">
    <div class="profile-img col-sm-3 col-xs-4">
        <?= $this->Html->image(empty($user->avatar) ? $avatarPlaceholder : $user->avatar, ['width' => '180', 'height' => '180']); ?>
        <h3 class="user-name">
            <?=
            $this->Html->tag(
                'span',
                __d('CakeDC/Users', '{0} {1}', $user->first_name, $user->last_name),
                ['class' => 'full_name']
            )
            ?>
        </h3>
        <?php //@todo add to config ?>
        <div class="prof-changepass">
             <?= $this->Html->link(__d('CakeDC/Users', 'Change Password'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword']); ?>
        </div>
    </div>

    <div class="col-sm-9 col-xs-8">
        <div class="subheader">
            <h2><?= __d('CakeDC/Users', 'Username') ?></h2>
            <p><?= h($user->username) ?></p>
        </div>

        <div class="subheader">
            <h2><?= __d('CakeDC/Users', 'Email') ?></h2>
            <p><?= h($user->email) ?></p>
        </div>

        <?php
        if (!empty($user->social_accounts)):
            ?>
            <h2><?= __d('CakeDC/Users', 'Social Accounts') ?></h2>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th><?= __d('CakeDC/Users', 'Avatar'); ?></th>
                        <th><?= __d('CakeDC/Users', 'Provider'); ?></th>
                        <th><?= __d('CakeDC/Users', 'Link'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user->social_accounts as $socialAccount):
                    $escapedUsername = h($socialAccount->username);
                    $linkText = empty($escapedUsername) ? __d('CakeDC/Users', 'Link to {0}', h($socialAccount->provider)) : h($socialAccount->username)
                    ?>
                    <tr>
                        <td><?=
                            $this->Html->image(
                                $socialAccount->avatar,
                                ['width' => '90', 'height' => '90']
                            ) ?>
                        </td>
                        <td><?= h($socialAccount->provider) ?></td>
                        <td><?=
                            $this->Html->link(
                                $linkText,
                                $socialAccount->link,
                                ['target' => '_blank']
                            ) ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        <?php
        endif;
        ?>
    </div>
</div>
<hr>
<div class="profile-users row">
  <div class="form-group">
    <label class="col-sm-3 control-label">Alamat Sesuai KTP</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->address) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Tanggal Lahir</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->dob) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Umur</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->age) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Handphone</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->handphone) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">No.Telephon</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->no_tlp1) ?></p>
    </div>
  </div>
<!--   <div class="form-group">
    <label class="col-sm-3 control-label">No. Telephon Saudara/Kerabat</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->no_tlp2) ?></p>
    </div>
  </div> -->
  <div class="form-group">
    <label class="col-sm-3 control-label">No. KTP</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->ktp1) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">No. KTP Suami/Istri</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->ktp2) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Kartu Keluarga</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->kartukeluarga) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">No. Rekening</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->no_rekening) ?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">No. NPWP</label>
    <div class="col-sm-9">
      <p class="form-control-static"><?= h($user->no_npwp) ?></p>
    </div>
  </div>
</div>
<hr>
<div class="button-wrapper row">
    <div class="col-sm-12">
      <a class="btn" href="/profile/edit">Edit</a>

    <?php //$this->Html->link(__d('/profile', 'Edit'), [$user->id]); ?>
    </div>
</div>
