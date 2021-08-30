<!Doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <title>Liste des Réservations</title>
    </head>
   <style>
       table {
           border-collapse: collapse;
           widows: 100%;
       }
       th,td {
           text-align: left;
           padding: 8px;
       }
       th{
           background-color: #c93305;
           color: white;
       }
   </style>    
<body>
    <div  style="margin-top: 50px;">
        <h3 style="text-align: center; color:blue;"><b>Liste des Utilisateurs</b></h3>
        <table>
          <thead>
            <tr>
              <th style="width: 25%;">Utilisateurs</th>
              <th style="width: 25%;" class="text-center">Email</th>
              <th style="width: 25%;">Rôle</th>
              <th style="width: 25%;" class="text-center">Adresse</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            @if ($user->role =="participant" || $user->role == "organisateur")
            <tr>
              <td>{{$user->name}}</td>
              <td class="text-center">{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td class="text-center">{{ $user->adresse }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
</body>
</html>