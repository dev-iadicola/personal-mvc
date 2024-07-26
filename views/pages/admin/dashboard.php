
<section class="container justify-content-center m-auto">
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fa fa-tachometer"></i> Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-primary">Share</button>
      <button class="btn btn-sm btn-primary">Export</button>
    </div>
    <button class="btn btn-sm btn-primary dropdown-toggle">
      <i class="fa fa-calendar"></i>
      This week
    </button>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
    <div class="card text-white bg-primary">
      <div class="card-header"><i class="fa fa-shopping-bag"></i> New Orders</div>
      <div class="card-body">
        <h3 class="card-title">150</h3>
      </div>
      <a class="card-footer text-right" href="#">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
    <div class="card text-white bg-success">
      <div class="card-header"><i class="fa fa-bar-chart"></i> Bounce Rate</div>
      <div class="card-body">
        <h3 class="card-title">53%</h3>
      </div>
      <a class="card-footer text-right" href="#">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
    <div class="card text-white bg-warning">
      <div class="card-header"><i class="fa fa-user-plus"></i> User Registrations</div>
      <div class="card-body">
        <h3 class="card-title">44</h3>
      </div>
      <a class="card-footer text-right" href="#">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
    <div class="card text-white bg-danger">
      <div class="card-header"><i class="fa fa-pie-chart"></i> Unique Visitor</div>
      <div class="card-body">
        <h3 class="card-title">65</h3>
      </div>
      <a class="card-footer text-right" href="#">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
    <div class="card-collapsible card">
      <div class="card-header">
        Doughnut Chart <i class="fa fa-caret-down caret"></i>
      </div>
      <div class="card-body d-flex justify-content-around">
          <canvas class="chart w-100" id="pieChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
    <div class="card-collapsible card">
      <div class="card-header">
        Bar Chart <i class="fa fa-caret-down caret"></i>
      </div>
      <div class="card-body d-flex justify-content-around">
          <canvas class="chart w-100" id="barChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
    <div class="card-collapsible card">
      <div class="card-header">
        Table <i class="fa fa-caret-down caret"></i>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead bg-primary text-white">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
    <div class="card-collapsible card">
      <div class="card-header">
        Quick Form <i class="fa fa-caret-down caret"></i>
      </div>
      <div class="card-body">
        <form>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Assignee's email">
            <div class="input-group-append">
              <span class="input-group-text">@example.com</span>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Ticket title">
          </div>

          <div class="form-group">
            <textarea class="form-control" placeholder="Ticket description" cols="30" rows="5"></textarea>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-send"></i>
                Submit Ticket
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</section>
