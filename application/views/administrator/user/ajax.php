<table class="table table-center">
  <thead>
    <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Email</th>
      <th>Created</th>
      <th>Status</th>
      <th><i class="fas fa-cog"></i></th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($users) > 0 && !empty($users)): ?>
      <?php foreach($users AS $user): ?>
        <tr>
          <td><?= $user->first_name . ' ' . $user->last_name; ?></td>
          <td><?= ucfirst($user->role_name) ?></td>
          <td><?= $user->email ?></td>
          <td><?= $user->modified ?></td>
          <td>Live</td>
          <td>
            <a href="/administrator/users/edit/<?= $user->id; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
            <a href="/administrator/users/delete/<?= $user->id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="100">No users found!</td></tr>
    <?php endif; ?>
  </tbody>
</table>
<?php if($links): ?>
  <div class="card-footer">
    <div class="card-tools">
      <?php echo $links; ?>
    </div>
  </div>
<?php endif; ?>