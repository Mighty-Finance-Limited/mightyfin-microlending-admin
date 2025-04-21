
<div  data-aos="fade-right" id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    @include('layouts.parts.admin.aside-header')

    <div class="aside-menu flex-column-fluid">
        <div class="mx-3 my-5 hover-scroll-overlay-y my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <a href="{{ route('dashboard') }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </span>
                    </a>
                </div>

                @can('view clientele')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Customers</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        @can('view clientele')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('borrowers') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Borrowers</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
                @endcan


                <div class="pt-5 menu-item">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Management</span>
                    </div>
                </div>

                @can('view loans')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-plus fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        <span class="menu-title">Loan Applications</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('view-loan-requests') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="text-warning menu-title">Loan Requests</span>
                            </a>
                        </div>
                        @endcan

                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('approved-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Open Loans</span>
                            </a>
                        </div>
                        @endcan

                        @can('view closed')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('closed-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Closed Loans</span>
                            </a>
                        </div>
                        @endcan
                        {{-- @can('create loan') --}}
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('create.loan') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>

                                <span class="menu-title">Add a Loan</span>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('due-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Due Loans</span>
                            </a>
                        </div>
                        @endcan

                        @can('view pending repayments')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('pending-repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Repayments</span>
                            </a>
                        </div>
                        @endcan
                        @can('view missed repayments')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('missed-repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Missed Repayments</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loan-arrears') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Loans in Arrears</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('no-repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">No Repayments</span>
                            </a>
                        </div>
                        @endcan
                        @can('view past maturity')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('past-maturity-date') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Past Maturity Date</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('principal-outstanding') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Principal Outstanding</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('one-month-late') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">1 Month Late Loans</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('three-month-late') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">3 Months Late Loans</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loan-calculator') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Loan Calculator</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('approved-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Guarantors</span>
                            </a>
                        </div>
                        @endcan
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">View all Loans</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan

                @can('view operations')
                    <div class="pt-5 menu-item">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Operations & Staff</span>
                        </div>
                    </div>
                    @can('view employees')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-user fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Employees</span>
                            <span class="menu-arrow"></span>
                        </span>


                        <div class="menu-sub menu-sub-accordion">
                            <div  class="mb-1 menu-item menu-accordion">
                                <a class="menu-link" href="{{ route('employees') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Staff Members</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('view accounting')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-wallet fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Accounting</span>
                            <span class="menu-arrow"></span>
                        </span>


                        <div class="menu-sub menu-sub-accordion">
                            @can('view transactions')
                            <div class="mb-1 menu-item menu-accordion">
                                <a href="{{ route('make-payment') }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Payment Transactions</span>
                                </a>
                            </div>
                            @endcan

                            @can('manage funds')
                            @endcan
                        </div>
                    </div>
                    @endcan

                    @can('view reports')
                    @endcan
                @endcan

                @can('system settings')
                <div class="pt-5 menu-item">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Settings</span>
                    </div>
                </div>

                @can('see the list of users')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-28 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div data-kt-menu-trigger="click" class="mb-1 menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                                <span class="menu-arrow"></span>
                            </span>

                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('users') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">All Users</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                <div class="menu-item">
                    <a class="menu-link" href="{{ route('sys-settings') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">System Settings</span>
                    </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentUrl = window.location.href;

        // Get all menu links
        document.querySelectorAll('.menu-link[href]').forEach(link => {
            if (currentUrl.startsWith(link.href)) {
                const menuItem = link.closest('.menu-item');

                if (menuItem) {
                    // Mark the current menu item
                    menuItem.classList.add('here');
                    menuItem.classList.add('show');

                    // Also add 'show' to all parent accordions to expand the hierarchy
                    let parent = menuItem.parentElement;
                    while (parent && !parent.classList.contains('menu')) {
                        if (parent.classList.contains('menu-sub')) {
                            const parentAccordion = parent.closest('.menu-item.menu-accordion');
                            if (parentAccordion) {
                                parentAccordion.classList.add('show');
                                parentAccordion.classList.add('here');
                            }
                        }
                        parent = parent.parentElement;
                    }
                }
            }
        });
    });
    </script>

