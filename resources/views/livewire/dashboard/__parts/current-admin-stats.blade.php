
<style>
    :root {
      --primary: #6a3093;
      --primary-dark: #482164;
      --success: #ffffff;
      --danger: #ef4444;
      --warning: #FFD700;
      --info: #6a3093;
      --dark: #482164;
      --light: #f8fafc;
      --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      --hover-transform: translateY(-5px);
    }


    .dashboard-title {
      color: var(--dark);
      font-weight: 700;
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid var(--primary);
      display: inline-block;
    }

    .stat-card {
      border-radius: 12px;
      border: none;
      overflow: hidden;
      box-shadow: var(--card-shadow);
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
    }

    .stat-card:hover {
      transform: var(--hover-transform);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .stat-card .card-body {
      padding: 1.75rem;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .stat-card .icon-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 60px;
      height: 60px;
      border-radius: 12px;
      margin-bottom: 1.25rem;
    }

    .stat-card .amount {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      line-height: 1.2;
    }

    .stat-card .title {
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      opacity: 0.85;
      margin-bottom: 0.75rem;
    }

    .stat-card .count {
      font-size: 1.25rem;
      font-weight: 600;
      margin-top: auto;
    }

    .bg-white-card {
      background-color: white;
    }
    .bg-white-card .icon-wrapper {
      background-color: rgba(59, 130, 246, 0.1);
      color: var(--primary);
    }

    .bg-primary-card {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
    }
    .bg-primary-card .icon-wrapper {
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .bg-dark-card {
      background: linear-gradient(135deg, var(--dark) 0%, #0f172a 100%);
      color: white;
    }
    .bg-dark-card .icon-wrapper {
      background-color: rgba(255, 255, 255, 0.15);
      color: white;
    }

    .bg-info-card {
      background: linear-gradient(135deg, var(--info) 0%, #b700ff 100%);
      color: white;
    }
    .bg-info-card .icon-wrapper {
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .bg-danger-card {
      background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
      color: white;
    }
    .bg-danger-card .icon-wrapper {
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .card-bottom-line {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 4px;
      width: 100%;
    }

    .dashboard-container {
      padding: 2rem 0;
    }

    .text-light-muted {
      color: rgba(255, 255, 255, 0.85);
    }

    /* Make cards equal height in a row */
    .row-cols-xl-3 > * {
      margin-bottom: 1.5rem;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .stat-card .amount {
        font-size: 1.75rem;
      }
    }
  </style>

  <div class="container-fluid dashboard-container">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
      <!-- Open Loans Card -->
      <div class="col">
        <a href="#" class="text-decoration-none">
          <div class="stat-card bg-white-card">
            <div class="card-body">
              <div class="icon-wrapper">
                <i class="fa-solid fa-wallet fa-lg"></i>
              </div>
              <div class="amount">K {{  number_format(App\Models\Application::totalAmountLoanedOut(), 2, '.',',') }}</div>
              <div class="title text-muted">Total Active Loans</div>
              <div class="count">{{ App\Models\Application::totalApprovedLoans() }} Loans</div>
            </div>
            <div class="card-bottom-line bg-primary"></div>
          </div>
        </a>
      </div>

      <!-- Pending Loans Card -->
      <div class="col">
        <a href="{{ route('view-loan-requests') }}" class="text-decoration-none">
          <div class="stat-card bg-primary-card">
            <div class="card-body">
              <div class="icon-wrapper">
                <i class="fa-solid fa-hourglass-half fa-lg"></i>
              </div>
              <div class="amount">K {{ number_format(App\Models\Application::totalAmountPending(),2,'.',',') }}</div>
              <div class="title text-light-muted">Pending Borrowed Amount</div>
              <div class="count">{{ App\Models\Application::totalPendingLoans() }} Loan Application</div>
            </div>
          </div>
        </a>
      </div>

      <!-- Collected Amount Card -->
      <div class="col">
        <a href="{{ route('closed-loans') }}" class="text-decoration-none">
          <div class="stat-card bg-dark-card">
            <div class="card-body">
              <div class="icon-wrapper">
                <i class="fa-solid fa-sack-dollar fa-lg"></i>
              </div>
              <div class="amount">K {{ number_format(App\Models\Transaction::total_collected(),2,'.',',') }}</div>
              <div class="title text-light-muted">Total Collected Amount</div>
              <div class="count">&nbsp;</div>
            </div>
          </div>
        </a>
      </div>

      <!-- Opened Loans Card -->
      <div class="col">
        <a href="{{ route('borrowers') }}" class="text-decoration-none">
          <div class="stat-card bg-info-card">
            <div class="card-body">
              <div class="icon-wrapper">
                <i class="fa-solid fa-check-circle fa-lg"></i>
              </div>
              <div class="amount">K {{  number_format(App\Models\Application::totalOpenAmount(), 2, '.',',') }}</div>
              <div class="title text-light-muted">Total Open Loans</div>
              <div class="count">{{ App\Models\Application::totalOpenCount() }} Opened</div>
            </div>
          </div>
        </a>
      </div>

      <!-- Bad Loans Card -->
      <div class="col">
        <a href="{{ route('closed-loans') }}" class="text-decoration-none">
          <div class="stat-card bg-white-card">
            <div class="card-body">
              <div class="icon-wrapper" style="background-color: rgba(239, 68, 68, 0.1); color: var(--danger);">
                <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
              </div>
              <div class="amount">K {{  number_format(App\Models\Application::totalAmountClosed(), 2, '.',',') }}</div>
              <div class="title text-primary">Total Cleared Loans</div>
              <div class="count">{{ App\Models\Application::totalAmountClosedCount() }} Closed</div>
            </div>
            <div class="card-bottom-line bg-danger"></div>
          </div>
        </a>
      </div>

      <!-- Declined Loans Card -->
      <div class="col">
        <a href="{{ route('view-loan-requests') }}" class="text-decoration-none">
          <div class="stat-card bg-danger-card">
            <div class="card-body">
              <div class="icon-wrapper">
                <i class="fa-solid fa-xmark-circle fa-lg"></i>
              </div>
              <div class="amount">K {{ number_format(App\Models\Application::totalDeclinedLoans(),2,'.',',') }}</div>
              <div class="title text-light-muted">Total Declined Loans</div>
              <div class="count">&nbsp;</div>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
