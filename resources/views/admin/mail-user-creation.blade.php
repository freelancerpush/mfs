<h1>Hi, {{ $firstname }}!</h1>
 
<p>Your account detail, <a href="{{ url('/login') }}" >Login</a></p>

<p>First name: {{ $firstname }}</p>
<p>Last name: {{ $last_name }}</p>
<p>Account Created on: {{ $created_at }}</p>
<p>Username: {{ $username }}</p>
<p>Email Address: {{ $email }}</p>
<p>Phone: {{ $phone }}</p>
<p>Password: {{ $password }}</p>

<p>Thanks :-)</p>