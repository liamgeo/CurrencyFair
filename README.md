# CurrencyFair
Trading message platform using PHP, MySQL, HTML and CSS.

The approach used to create this web application was initially to create a Sign Up and Login PHP pages. This was specically used as I could create a $SESSION variable to extract the userID of the current logged in user. Once this was accomplished I then created the login flow of pages that a logged in user would only be allowed to access. This included:

Profile page- displays the information the user inputted in a POST on the Sign Up page.

Menu page- in which the user could select if they wanted to add a trading message or view a trading message.

Inserting Trading message page- this page made use of a drop down box which the user could select what currency they would like to choose from. The $SESSION varibale was used again here to use an INSERT statement in SQL. Once the information had been inputted by the user and they selected the "Insert" button the current page would automatically reload displaying a "Trading Message Inserted". I felt this was a better alternative than creating a new page with displaying this message.

Viewing Trading message page- within this page it showed only the information that this specific logged in user has inputted. This was achieved using the $SESSION variable. A SELECT statement was used here along with an INNER JOIN to successfully output in a card format the information the user inputted. 

Logout page- This page was created to log the current user out.

The relevant code can be accessed in the Master.
