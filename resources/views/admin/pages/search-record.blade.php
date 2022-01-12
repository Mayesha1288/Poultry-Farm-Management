@extends ('admin.welcome')

@section('contents')


<h3>Searched Record list</h3>

<a href="#" class="btn btn-warning" onclick="printDiv('PrintTableArea')">Print</a>

<div id="PrintTableArea">
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">  Date</th>
      <th scope="col">Hens Died</th>
      <th scope="col">Sick Hens</th>
      <th scope="col">vaccinated hens</th>
      <th scope="col">eggs collected</th>
      <th scope="col">eggs damaged</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
  @foreach($records as $record)
    <tr>
    <th > {{$record->id}}</th>
    <th > {{$record->date}}</th>
        <th > {{$record->hens_died}}</th>
        <th>{{$record->sick_hens}}</th>
        <th>{{$record->vaccinated_hens}}</th>
        <th>{{$record->eggs_collected}}</th>
        <th >{{$record->eggs_damaged}}</th>
        
        <td>
                        <a class="btn btn-primary" href="{{route('admin.record.details',$record->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.record.delete',$record->id)}}">Delete</a>
                        <br>
                        <a class="btn btn-danger" href="{{route('admin.record.edit',$record->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
    
  </tbody>
  </table>
  </div>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection