<!DOCTYPE html>
<html>
  <head>
    <title>Message Page</title>
    <link rel='stylesheet' type='text/css' media='screen' href='message.css'>
  </head>
  <body>
    <header>
      <h1>Welcome to the Message Page</h1>
    </header>

    <nav>
      <ul>
        <li><a href="#inbox">Inbox</a></li>
        <li><a href="#sent">Sent</a></li>
        <li><a href="#compose">Compose</a></li>
      </ul>
    </nav>

    <main>
      <section id="inbox">
        <h2>Inbox</h2>
        <table>
          <tr>
            <th>From</th>
            <th>Subject</th>
            <th>Date</th>
          </tr>
          <!-- Add rows for each message in the inbox -->
          <tr>
            <td>John Doe</td>
            <td><a href="#message-1">Hello!</a></td>
            <td>01/01/2022</td>
          </tr>
        </table>
      </section>

      <section id="sent">
        <h2>Sent</h2>
        <table>
          <tr>
            <th>To</th>
            <th>Subject</th>
            <th>Date</th>
          </tr>
          <!-- Add rows for each message in the sent folder -->
          <tr>
            <td>Jane Doe</td>
            <td><a href="#message-2">Hi there!</a></td>
            <td>01/02/2022</td>
          </tr>
        </table>
      </section>

      <section id="compose">
        <h2>Compose</h2>
        <form>
          <label for="to">To:</label>
          <input type="text" id="to" name="to">

          <label for="subject">Subject:</label>
          <input type="text" id="subject" name="subject">

          <label for="message">Message:</label>
          <textarea id="message" name="message"></textarea>

          <input type="submit" value="Send">
        </form>
      </section>

      <section id="message-1">
        <h2>Hello!</h2>
        <p>This is the content of message 1.</p>
      </section>

      <section id="message-2">
        <h2>Hi there!</h2>
        <p>This is the content of message 2.</p>
      </section>
    </main>

    <footer>
      <p>&copy; 2023 Message Page</p>
    </footer>
  </body>
</html>
