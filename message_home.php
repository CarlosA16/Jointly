<!DOCTYPE html>

<?php
if ($_GET['run']) {
  # This code will run if ?run=true is set.
  exec("client.py");
}
?>


<html>
  <head>
  <link rel="stylesheet" href="Message_home.css">
    <title>Message Page</title>
    <link rel='stylesheet' type='text/css' media='screen' href='message.css'>
  </head>
  <body>
    <header>
      <h1>Welcome to the Message Page</h1>
    </header>


    <main>
      <section id="inbox">
        <h2>Inbox</h2>
        <table>
          <tr>
            <td>John Doe:</td>
            <!-- <td> profile pic here</td> -->
            <td><a>Hello!</a></td>
            <td>01/01/2022</td>
            <a href="?run=true">Chat Now!</a>
           </tr>
        </table>
      </section>
    </main>
      
    

    <footer>
      <p>&copy; 2023 Message Page Jointly</p>
    </footer>
  </body>
</html>
