
    <!-- Small Stats Blocks -->
    <div class="row row02">
      <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
          <div class="cont_icon hvr-radial-out">
              <i class="zmdi zmdi-email zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </div>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
          <div class="cont_icon hvr-radial-out">
              <i class="zmdi zmdi-calendar-note zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
              <i class="zmdi zmdi-notifications-active zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
              <i class="zmdi zmdi-file-text zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-12 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
              <i class="zmdi zmdi-help-outline zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </div>
        </div>
      </div>
    </div>
    <!-- End Small Stats Blocks -->
    <div class="row">
      <!-- Users Stats -->
      <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
          <div class="card-header border-bottom">
            <h6 class="m-0">Users</h6>
          </div>
          <div class="card-body pt-0">
            <div class="row border-bottom py-2 bg-light">
              <div class="col-12 col-sm-6">
                <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                  <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                  <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                  <span class="input-group-append">
                    <span class="input-group-text">
                      <i class="material-icons"></i>
                    </span>
                  </span>
                </div>
              </div>
              <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
              </div>
            </div>
            <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
          </div>
        </div>
      </div>
      <!-- End Users Stats -->

      <!-- Users By Device Stats -->
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
          <div class="card-header border-bottom">
            <h6 class="m-0">Users by device</h6>
          </div>
          <div class="card-body d-flex py-0">
            <canvas height="220" class="blog-users-by-device m-auto"></canvas>
          </div>
          <div class="card-footer border-top">
            <div class="row">
              <div class="col">
                <select class="custom-select custom-select-sm" style="max-width: 130px;">
                  <option selected>Last Week</option>
                  <option value="1">Today</option>
                  <option value="2">Last Month</option>
                  <option value="3">Last Year</option>
                </select>
              </div>
              <div class="col text-right view-report">
                <a href="#">Full report &rarr;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Users By Device Stats -->

      <!-- New Draft Component -->
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <!-- Quick Post -->
        <div class="card card-small h-100">
          <div class="card-header border-bottom">
            <h6 class="m-0">New Draft</h6>
          </div>
          <div class="card-body d-flex flex-column">
            <form class="quick-post-form">
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brave New World"> </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Words can be like X-rays if you use them properly..."></textarea>
              </div>
              <div class="form-group mb-0">
                <button type="submit" class="btn btn-accent">Create Draft</button>
              </div>
            </form>
          </div>
        </div>
        <!-- End Quick Post -->
      </div>
      <!-- End New Draft Component -->

      <!-- Top Referrals Component -->
      <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
          <div class="card-header border-bottom">
            <h6 class="m-0">Top Referrals</h6>
          </div>
          <div class="card-body p-0">
            <ul class="list-group list-group-small list-group-flush">
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">GitHub</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">Hacker News</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">Reddit</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">The Next Web</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">YouTube</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
              </li>
              <li class="list-group-item d-flex px-3">
                <span class="text-semibold text-fiord-blue">Adobe</span>
                <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
              </li>
            </ul>
          </div>
          <div class="card-footer border-top">
            <div class="row">
              <div class="col">
                <select class="custom-select custom-select-sm">
                  <option selected>Last Week</option>
                  <option value="1">Today</option>
                  <option value="2">Last Month</option>
                  <option value="3">Last Year</option>
                </select>
              </div>
              <div class="col text-right view-report">
                <a href="#">Full report &rarr;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Top Referrals Component -->
    </div>

