# Laboratory Activity 14 – Locking the Front Door

## Part F – Reflection Questions

### F1. Authentication vs. Authorisation

Authentication verifies who is using the system, while authorisation determines what that user is allowed to access. In my Book Catalog project, users must log in before managing books, while the next step is to apply more specific permissions based on user roles.

### F2. Why use `session()->regenerate()` after login?

In my LoginController, `session()->regenerate()` is called after successful login to create a new session ID. Skipping this step can expose the application to session fixation attacks, where an attacker may try to reuse a known session ID.

### F3. Why use the same failed-login message?

My Book Catalog displays the same error message whether the email is incorrect or the password is wrong. This prevents unauthorized users from discovering which email addresses are registered in the system.

### F4. Why are some book routes public and others protected?

The `index` and `show` routes are public so visitors can browse the book catalog and view book details without logging in. The `create`, `edit`, `update`, and `destroy` routes require authentication because they allow users to add, modify, or delete book records.

### F5. Why is hiding buttons not enough to protect the system?

Hiding the Add, Edit, and Delete buttons only changes what visitors can see on the page. In my project, the `auth` middleware protects the actual routes and prevents guests from accessing restricted pages by manually entering their URLs.

### F6. Why must the login route be named exactly `login`?

Laravel's authentication middleware redirects unauthenticated users to the route named `login`. If that route name is changed or missing, the application cannot find the correct login page and may display a `Route [login] not defined` error.