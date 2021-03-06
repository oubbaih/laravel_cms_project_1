<x-admin-master >
  @section('content')
  @if(auth()->user()->userHasRole('admin'))
  <h1 class="h3 mb-4 text-grey-800">Dashbord</h1>
  <div class="chart-container" style="position: relative; height:20vh; width:80vw">
    <canvas id="myChart"></canvas>
</div>
  @endif
  @endsection


  @section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js" integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['posts' , 'categories' , 'comments' , 'media' ,'roles' , 'permissions' , 'users'],
        datasets: [{
            label: 'CMS Data Analysis',
            data: [ {{$postsCount }}, {{$categoriesCount }}, {{$commentCount}}, {{$mediaCount}},{{$rolesCount}}, {{$permissionsCount}}    ,{{$userCount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(101, 159, 68, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(55, 109, 74, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
  
  
  @endsection
@section('copyright')
     <div class="copyright text-center my-auto">
          @if(isset($setting))
          @foreach ($setting as $set)
          <span>{{$set->footer_copy_right}}</span>
          @endforeach
          @endif
        </div>
@endsection
</x-admin-master>