<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Buat Account Baru</h1>

    <h3>Sign Up Form</h3>
    <ul> 
        <li><form action="/welcome" method="POST">
        @csrf
      <label for="First name">First name:</label> <br>
        <input type="text" name="First name" id="First names" required> <br> <br>

        <label>Last name:</label> <br>
        <input type="text" name="Last name"> <br> <br>

        <label>Gander</label> <br>
        <input type="radio" name="Gander" value="Male"> Male <br>
        <input type="radio"name="Gander" value="Female"> Female <br> 
        <input type="radio"name="Gander" value="Other"> Other  <br> <br>

        <label>Nationality:</label> <br>
        <select name="Nationality:">
            <option value="1">Indonesian</option>
            <option value="2">Australia</option>
            <option value="3">Malaysia</option>
            <option value="4">jepang</option>
        </select> <br> <br>

       
        <label>Language Spoken:</label> <br>
        <input type="checkbox" name="Language Spoken" id="" value="1"> Bahasa Indonesia <br>
        <input type="checkbox" name="Language Spoken" id="" value="2"> English <br>
        <input type="checkbox" name="Language Spoken" id="" value="3"> Other <br> <br>

        <label>Bio</label> <br>
        <textarea name="Bio" cols="30" rows="10"></textarea> <br> <br>

        <button type="submit">Submit</button>
        </ul>
    </form>
</body>
</html> </li>


    


    