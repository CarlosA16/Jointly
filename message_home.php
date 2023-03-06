<!DOCTYPE html>
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
          </tr>
        </table>
      </section>
    </main>
      
      <section id="send">
        <h2>send</h2>
        <form>
          <label for="to">To:</label>
          <input type="text" id="to" name="to">

          <label for="message">Message:</label>
          <input id="message" name="message"></input>

          <input type="submit" value="Send">
        </form>
      </section>
    

    <footer>
      <p>&copy; 2023 Message Page Jointly</p>
    </footer>
  </body>
</html>
