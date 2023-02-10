<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
   <input type="hidden" name="action" value="submit_form">
   <p>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
   </p>
   <p>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
   </p>
   <p>
      <label for="message">Message:</label>
      <textarea id="message" name="message"></textarea>
   </p>
   <input type="submit" value="Submit">
</form>
