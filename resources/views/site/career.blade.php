@extends('layouts.site', ['pageTitle' => 'Career', 'active' => 'career'])
@section('content')
    <section class="page-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">Job openings</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="accordion fade-from-top-children " id="job-accordion">
                <div class="card job-item">
                    <div class="card-header" id="heading-job-1">
                        <a href="#" data-toggle="collapse" data-target="#job-tab-1" aria-expanded="true" aria-controls="job-tab-1">
                            <h3 class="job-item__title">Project Manager, Architecture</h3>
                            <div class="job-item__meta d-md-flex align-items-center">
                                <div class="job-item__loc location mr-lg-4"><i class="icomoon-pin"></i> New York, NY</div>
                                <div class="job-item__date date">Posted 3 days ago</div>
                            </div>
                        </a>
                    </div>
                    <div id="job-tab-1" class="collapse show" aria-labelledby="heading-job-1" data-parent="#job-accordion">
                        <div class="card-body">
                            <div class="job-item__content">
                                <table class="job-table">
                                    <tr>
                                        <th>Job description</th>
                                        <td>
                                            Project Managers are responsible for the successful management of multiple
                                            interior design projects whilst leading and mentoring assigned staff. You
                                            will be responsible for leading consultants and internal resources, managing
                                            the development of contract documents, adhering to budgets, contract
                                            facilitation and construction site representation whilst maintaining
                                            client contact throughout the life of a project.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>You have</th>
                                        <td>
                                            <ul>
                                                <li>5+ years of experience managing corporate and/or commercial interior projects</li>
                                                <li>Bachelor’s Degree in Interior Design or related field</li>
                                                <li>CID or NCIDQ Certification</li>
                                                <li>AutoCAD and Revit skills</li>
                                                <li>Knowledge of Microsoft Project, Word, Excel, and Newforma</li>
                                                <li>Thorough knowledge of building codes</li>
                                                <li>Ability to coordinate a complete set of contract documents</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <a href="#" class="btn btn-primary">Apply</a>
                                            <a href="#" class="btn btn-primary">Apply with LinkedIn</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card job-item">
                    <div class="card-header" id="heading-job-2">
                        <a href="#" data-toggle="collapse" data-target="#job-tab-2" aria-expanded="false" aria-controls="job-tab-2">
                            <h3 class="job-item__title">Interior Design Project Manager, Corporate Accounts</h3>
                            <div class="job-item__meta d-md-flex align-items-center">
                                <div class="job-item__loc location mr-lg-4"><i class="icomoon-pin"></i> Los Angeles, CA</div>
                                <div class="job-item__date date">Posted 7 days ago</div>
                            </div>
                        </a>
                    </div>
                    <div id="job-tab-2" class="collapse" aria-labelledby="heading-job-2" data-parent="#job-accordion">
                        <div class="card-body">
                            <div class="job-item__content">
                                <table class="job-table">
                                    <tr>
                                        <th>Job description</th>
                                        <td>
                                            Project Managers are responsible for the successful management of multiple
                                            interior design projects whilst leading and mentoring assigned staff. You
                                            will be responsible for leading consultants and internal resources, managing
                                            the development of contract documents, adhering to budgets, contract
                                            facilitation and construction site representation whilst maintaining
                                            client contact throughout the life of a project.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>You have</th>
                                        <td>
                                            <ul>
                                                <li>5+ years of experience managing corporate and/or commercial interior projects</li>
                                                <li>Bachelor’s Degree in Interior Design or related field</li>
                                                <li>CID or NCIDQ Certification</li>
                                                <li>AutoCAD and Revit skills</li>
                                                <li>Knowledge of Microsoft Project, Word, Excel, and Newforma</li>
                                                <li>Thorough knowledge of building codes</li>
                                                <li>Ability to coordinate a complete set of contract documents</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <a href="#" class="btn btn-primary">Apply</a>
                                            <a href="#" class="btn btn-primary">Apply with LinkedIn</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card job-item">
                    <div class="card-header" id="heading-job-3">
                        <a href="#" data-toggle="collapse" data-target="#job-tab-3" aria-expanded="false" aria-controls="job-tab-3">
                            <h3 class="job-item__title">Job Captain, Interior Architecture & Design</h3>
                            <div class="job-item__meta d-md-flex align-items-center">
                                <div class="job-item__loc location mr-lg-4"><i class="icomoon-pin"></i> Denver, CO</div>
                                <div class="job-item__date date">Posted 8 days ago</div>
                            </div>
                        </a>
                    </div>
                    <div id="job-tab-3" class="collapse" aria-labelledby="heading-job-3" data-parent="#job-accordion">
                        <div class="card-body">
                            <div class="job-item__content">
                                <table class="job-table">
                                    <tr>
                                        <th>Job description</th>
                                        <td>
                                            Project Managers are responsible for the successful management of multiple
                                            interior design projects whilst leading and mentoring assigned staff. You
                                            will be responsible for leading consultants and internal resources, managing
                                            the development of contract documents, adhering to budgets, contract
                                            facilitation and construction site representation whilst maintaining
                                            client contact throughout the life of a project.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>You have</th>
                                        <td>
                                            <ul>
                                                <li>5+ years of experience managing corporate and/or commercial interior projects</li>
                                                <li>Bachelor’s Degree in Interior Design or related field</li>
                                                <li>CID or NCIDQ Certification</li>
                                                <li>AutoCAD and Revit skills</li>
                                                <li>Knowledge of Microsoft Project, Word, Excel, and Newforma</li>
                                                <li>Thorough knowledge of building codes</li>
                                                <li>Ability to coordinate a complete set of contract documents</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <a href="#" class="btn btn-primary">Apply</a>
                                            <a href="#" class="btn btn-primary">Apply with LinkedIn</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card job-item">
                    <div class="card-header" id="heading-job-4">
                        <a href="#" data-toggle="collapse" data-target="#job-tab-4" aria-expanded="false" aria-controls="job-tab-4">
                            <h3 class="job-item__title">Job Captain, Interior Design</h3>
                            <div class="job-item__meta d-md-flex align-items-center">
                                <div class="job-item__loc location mr-lg-4"><i class="icomoon-pin"></i> Denver, CO</div>
                                <div class="job-item__date date">Posted 8 days ago</div>
                            </div>
                        </a>
                    </div>
                    <div id="job-tab-4" class="collapse" aria-labelledby="heading-job-4" data-parent="#job-accordion">
                        <div class="card-body">
                            <div class="job-item__content">
                                <table class="job-table">
                                    <tr>
                                        <th>Job description</th>
                                        <td>
                                            Project Managers are responsible for the successful management of multiple
                                            interior design projects whilst leading and mentoring assigned staff. You
                                            will be responsible for leading consultants and internal resources, managing
                                            the development of contract documents, adhering to budgets, contract
                                            facilitation and construction site representation whilst maintaining
                                            client contact throughout the life of a project.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>You have</th>
                                        <td>
                                            <ul>
                                                <li>5+ years of experience managing corporate and/or commercial interior projects</li>
                                                <li>Bachelor’s Degree in Interior Design or related field</li>
                                                <li>CID or NCIDQ Certification</li>
                                                <li>AutoCAD and Revit skills</li>
                                                <li>Knowledge of Microsoft Project, Word, Excel, and Newforma</li>
                                                <li>Thorough knowledge of building codes</li>
                                                <li>Ability to coordinate a complete set of contract documents</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <a href="#" class="btn btn-primary">Apply</a>
                                            <a href="#" class="btn btn-primary">Apply with LinkedIn</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brands bg-light">
        <div class="container">
            <div class="row align-items-center brand-list">
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-1.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-2.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-3.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-4.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-5.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-6.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-7.png" alt=""></div>
                <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-8.png" alt=""></div>
            </div>
        </div>
    </section>
@endsection
