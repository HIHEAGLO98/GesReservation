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
    <div style="margin-top: 50px;">
       <h3 style="text-align: center; color:blue;"><b>Liste des Réservations</b></h3>
        <table>
        <thead>
            <tr>
            <th style="width: 25%;">Evénement</th>
            <th style="width: 25%;">Participant</th>
            <th style="width: 25%;">Organisateur</th>
            <th style="width: 25%;" class="text-center">Date de Réservation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
            <td>{{$booking->evenement->nom}}</td>
            <td>{{ $booking->participant->nom }}</td>
            <td>{{$booking->evenement->organisateur->nom}}</td>
            <td class="text-center"><span class="tag tag-success">{{$booking->created_at}}</span></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
   
</body>
</html>