<h1>Foreign Currency Purchase App</h1>
<hr/>
<h2>Set Up</h2>
<ul>
  <li>Git Clone this project</li>
  <li>Import the SQL file found in database/application_db.sql</li>
  <li>Change the default database credentials in - application/config/database</li>
  <li>If you want the SMTP for the email script to point else where change the constant in - application/config/constants</li>

</ul>

<hr/>
<h2>How To Use</h2>
<p>The interface is pretty straight foward, you select your values and calculate amount in the currency you want to purchase and visa versa and once you're ready to order you click order. <br/>
 This will take you to a confirmation page that shows all the calculations, extra charges and exchange rates
 after you confirm you data is saved in the database and a confirmation is emailed to vm if you're using the GBP currency
</p>
<h2></h2>
<p>Integration into a user authentication system.</p>