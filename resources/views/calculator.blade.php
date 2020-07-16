@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 margin-bottom-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Enter details</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="dy-ci-form" method="post" action="/calculate">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label">Principal Amount</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <input type="number" name="principle_amount" step="0.01" min="1" max="1000000000000" class="form-control input-lg" value="1000.0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label">Interest per annum</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="input-group">
                                <input type="number" name="interest" step="0.0001" min="0" max="100" class="form-control input-lg" value="5.0" required>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label">Time</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <label for="timeyear">Year</label>
                                    <input type="number" name="year" id="dy-ci-time-year" min="0" max="100" step="0.0" class="form-control input-lg" value="1" required>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <label for="timeyear">Month</label>
                                    <input type="number" name="month" name="interest" id="dy-ci-time-month" min="0" max="1200" step="0.0" class="form-control input-lg" value="0" required>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <label for="timeyear">Day</label>
                                    <input type="number" name="day" id="dy-ci-time-day" min="0" max="36500" step="0.0" class="form-control input-lg" value="0" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label">Number of times interest compounded per year</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <input type="number" name="no_of_time" id="dy-ci-compound-time" step="1" min="0" max="100" class="form-control input-lg" value="4" required>
                            <br>
                            <p>If interest is calculated</p>
                            <ul>
                            <li><strong>Yearly</strong> then set it to 1.</li>
                            <li><strong>Half yearly</strong> then set it to 2.</li>
                            <li><strong>Quarterly</strong> then set it to 4.</li>
                            <li><strong>Monthly</strong> then set it to 12.</li>
                            </ul>
                            <p>Note! Some banks calculate interest quarterly.</p>
                        </div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <button type="submit" class="btn btn-primary">Calculate</button>
                            <button type="reset" class="btn btn-default">Clear</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" id="dy-ci-message">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Result</h4>
            </div>
            <div class="panel-body">
                <div id="dy-ci-result-container">
                {{ session('info') }}
                </div>
            </div>
        </div>

@endsection