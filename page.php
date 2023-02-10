<?php
global $wpdb;
$table_name = $wpdb->prefix . 'contact_form';
$results = $wpdb->get_results("SELECT * FROM $table_name");
?>
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
  </tr>
  <?php foreach ($results as $result) { ?>
    <tr>
      <td><?php echo $result->name; ?></td>
      <td><?php echo $result->email; ?></td>
      <td><?php echo $result->message; ?></td>
    </tr>
  <?php } ?>
</table>

