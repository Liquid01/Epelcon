@extends('layouts.admin')
@section('page_title')
    My Downlines - table
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Page Length Options</h4>
                    <div class="row">
                        <div class="col s12">
                            <div id="page-length-option_wrapper" class="dataTables_wrapper">
                                <div class="dataTables_length" id="page-length-option_length"><label>Show <select
                                                name="page-length-option_length" aria-controls="page-length-option"
                                                class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select> entries</label></div>
                                <div id="page-length-option_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="" placeholder=""
                                                aria-controls="page-length-option"></label></div>
                                <table id="page-length-option" class="display dataTable dtr-inline collapsed"
                                       role="grid" aria-describedby="page-length-option_info" style="width: 1154px;">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="page-length-option"
                                            rowspan="1" colspan="1" style="width: 197px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1"
                                            colspan="1" style="width: 283px;"
                                            aria-label="Position: activate to sort column ascending">Position
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1"
                                            colspan="1" style="width: 147px;"
                                            aria-label="Office: activate to sort column ascending">Office
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1"
                                            colspan="1" style="width: 110px;"
                                            aria-label="Age: activate to sort column ascending">Age
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1"
                                            colspan="1" style="width: 126px;"
                                            aria-label="Start date: activate to sort column ascending">Start date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1"
                                            colspan="1" style="width: 123px; display: none;"
                                            aria-label="Salary: activate to sort column ascending">Salary
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td style="display: none;">$162,700</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1" tabindex="0" style="">Angelica Ramos</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                        <td style="display: none;">$1,200,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1" style="">Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td style="display: none;">$86,000</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1" tabindex="0">Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td style="display: none;">$132,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">Brenden Wagner</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                        <td style="display: none;">$206,850</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1">Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td style="display: none;">$372,000</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">Bruno Nash</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>38</td>
                                        <td>2011/05/03</td>
                                        <td style="display: none;">$163,500</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1" tabindex="0">Caesar Vance</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>21</td>
                                        <td>2011/12/12</td>
                                        <td style="display: none;">$106,450</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">Cara Stevens</td>
                                        <td>Sales Assistant</td>
                                        <td>New York</td>
                                        <td>46</td>
                                        <td>2011/12/06</td>
                                        <td style="display: none;">$145,600</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1">Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td style="display: none;">$433,060</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Position</th>
                                        <th rowspan="1" colspan="1">Office</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">Start date</th>
                                        <th rowspan="1" colspan="1" style="display: none;">Salary</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="dataTables_info" id="page-length-option_info" role="status"
                                     aria-live="polite">Showing 1 to 10 of 57 entries
                                </div>
                                <div class="dataTables_paginate paging_simple_numbers" id="page-length-option_paginate">
                                    <a class="paginate_button previous disabled" aria-controls="page-length-option"
                                       data-dt-idx="0" tabindex="0"
                                       id="page-length-option_previous">Previous</a><span><a
                                                class="paginate_button current" aria-controls="page-length-option"
                                                data-dt-idx="1" tabindex="0">1</a><a class="paginate_button "
                                                                                     aria-controls="page-length-option"
                                                                                     data-dt-idx="2"
                                                                                     tabindex="0">2</a><a
                                                class="paginate_button " aria-controls="page-length-option"
                                                data-dt-idx="3" tabindex="0">3</a><a class="paginate_button "
                                                                                     aria-controls="page-length-option"
                                                                                     data-dt-idx="4"
                                                                                     tabindex="0">4</a><a
                                                class="paginate_button " aria-controls="page-length-option"
                                                data-dt-idx="5" tabindex="0">5</a><a class="paginate_button "
                                                                                     aria-controls="page-length-option"
                                                                                     data-dt-idx="6" tabindex="0">6</a></span><a
                                            class="paginate_button next" aria-controls="page-length-option"
                                            data-dt-idx="7" tabindex="0" id="page-length-option_next">Next</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection