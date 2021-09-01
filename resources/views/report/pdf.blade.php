<!Doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <title>Liste des Evenements</title>
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
       <h3 style="text-align: center; color:blue;"><b>Liste des Evénements</b></h3>
        <table>
        <thead>
            <tr>
            <th style="width: 20%;">Evénement</th>
            <th style="width: 20%;">adresse</th>
            <th style="width: 20%;" class="text-center">Organisateur</th>
            <th style="width: 20%;" class="text-center">Date Début</th>
            <th style="width: 20%;" class="text-center">Date Fin</th>
            </tr>
        </thead>
        <tbody>  
            @foreach($evenements as $evenement)
            <tr>
            <td>{{$evenement->nom}}</td>
            <td>{{ $evenement->adresse }}</td>
            <td>{{$evenement->organisateur->nom}}</td>
            <td class="text-center"><span class="tag tag-success">{{ date('d/m/y',strtotime($evenement->datedebut))}}</span></td>
            <td class="text-center">{{  date('d/m/y',strtotime($evenement->datefin)) }} </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>