<!DOCTYPE html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['script'])) {
  $script = $_POST['script'];
  $output = shell_exec("python $script");
  echo $output;
}
?>

<html>
  <head>
  <link rel="stylesheet" href="Message_home.css">
    <title>Message Page</title>
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
            <form action= runchat() method="post">
            <button> Open Chat</button>
            </form>
          </tr>
        </table>
      </section>
    </main>
      
    

    <footer>
      <p>&copy; 2023 Message Page Jointly</p>
    </footer>
  </body>
</html>
