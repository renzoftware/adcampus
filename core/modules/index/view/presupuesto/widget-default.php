

<?php
    $lista_proyecto = ProyectoData::getProyectoAllActive();
    $lista_uexpl = UExplData::getUExplAllActive();
?>
<style type="text/css">
    .tablecat td{
        padding: 4px;
    }
    .animationload2{
        background-color: #2b5468 !important;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 20;
        opacity: 0.9;
    }

    .ui-theme-settings{
        /*width: 50% !important;*/
        width: 38%;
        min-width: 375px !important;
    }

    .ui-theme-settings .theme-settings__inner{
        /*width: 50%;*/
        min-width: 375px !important;
        width: auto !important;
    }

    .select-dark{
        color: #fff;
        background-color: #343a40;
        border-color: #444054;

        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;

        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='white' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e");
    }

</style>

<div class="container" id="msj_load_detalle">
   <div class="row">
     <div class="text-center">
     </div>    
     <div class="animationload2">
     </div>
   </div>
</div>

<div id="div_subcat_detalle" class="ui-theme-settings">
</div>

<div class="app-main__inner">   
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="form_gen_filtro">
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group">
                                    <select name="sel_uexpl" id="sel_uexpl" class="custom-select select-dark" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                                        <option value=""> -U. Expl- </option>
                                    <?php
                                        foreach ($lista_uexpl as $row_uexpl) {
                                    ?>
                                        <option value="<?php echo $row_uexpl->UExp_nIdUnExp?>"><?php echo $row_uexpl->UExp_cUnidadExp . " " . $row_uexpl->UExp_cSigla ;?></option>
                                    <?php
                                            
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="position-relative form-group">
                                    <select name="sel_proyecto" id="sel_proyecto" class="custom-select select-dark" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                        <option value=""> -Proyecto- </option>
                                    <?php
                                        foreach ($lista_proyecto as $row_proyecto) {
                                    ?>
                                        <option value="<?php echo $row_proyecto->Proy_nIdProyecto; ?>"><?php echo $row_proyecto->Proy_vProyecto;?></option>
                                    <?php
                                            
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="position-relative form-group">
                                    <select name="sel_dpto" id="sel_dpto" class="custom-select select-dark" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required>
                                        <option value=""> -Dpto.- </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="custom-radio custom-control">
                                    <input type="radio" id="opt_real1" name="opt_vista" class="custom-control-input" value="1" checked><label class="custom-control-label" for="opt_real1">Real</label>
                                </div>
                                <div class="custom-radio custom-control">
                                    <input type="radio" id="opt_real2" name="opt_vista" class="custom-control-input" value="2"><label class="custom-control-label" for="opt_real2">Budget</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="custom-radio custom-control">
                                    <input type="radio" id="opt_mes1" name="opt_mes" class="custom-control-input" value="1" checked><label class="custom-control-label" for="opt_mes1">Mes</label>
                                </div>
                                <div class="custom-radio custom-control">
                                    <input type="radio" id="opt_mes2" name="opt_mes" class="custom-control-input" value="2"><label class="custom-control-label" for="opt_mes2">Trimestre</label>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="form-row" id="tbl_general">
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- DIV detalle OC Pendientes -->
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"> Líneas de OC según estado
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <select name="sel_lin_estado" id="sel_lin_estado" class="custom-select select-dark" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required >
                                <option>-Estado-</option>
                                <option value="1">Ingresado</option>
                                <option value="2">Aprobado</option>
                                <option value="3">Despachado</option>
                                <option value="4">Rec. Parcial</option>
                                <option value="5">Rec. Total</option>
                                <option value="6">Cancelado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="form-row" id="tbl_lin_oc_pend">
                       
                    </div>
                </div>
                <!-- <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                    <button class="btn-wide btn btn-success">Save</button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                        Sales Report
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li>
                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        <canvas id="canvas" style="display: block; width: 450px; height: 225px;" width="450" height="225" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Top Authors</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container ps ps--active-y">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img class="rounded-circle" src="assets/images/avatars/9.jpg" alt="" width="42">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img class="rounded-circle" src="assets/images/avatars/5.jpg" alt="" width="42">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img class="rounded-circle" src="assets/images/avatars/4.jpg" alt="" width="42">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Vinnie Wagstaff</div>
                                                        <div class="widget-subheading">Java Programmer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>429</span>
                                                            <small class="text-warning pl-2">
                                                                <i class="fa fa-dot-circle"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img class="rounded-circle" src="assets/images/avatars/3.jpg" alt="" width="42">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img class="rounded-circle" src="assets/images/avatars/2.jpg" alt="" width="42">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 138px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                        Bandwidth Reports
                    </div>
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                            <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Tab 2</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab-eg-55">
                        <div class="widget-chart p-3">
                            <div style="height: 350px"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="line-chart" style="display: block; width: 458px; height: 350px;" width="458" height="350" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="widget-chart-content text-center mt-5">
                                <div class="widget-description mt-0 text-warning">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="pl-1">175.5%</span>
                                    <span class="text-muted opacity-8 pl-1">increased server resources</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">63%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Generated Leads</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">32%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Submitted Tickers</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">71%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Server Allocation</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">41%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Generated Leads</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Orders</div>
                            <div class="widget-subheading">Last year expenses</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success">1896</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning">$3M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Followers</div>
                            <div class="widget-subheading">People Interested</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger">45,9%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Income</div>
                            <div class="widget-subheading">Expected totals</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-focus">$147</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Expenses</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Active Users
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="active btn btn-focus">Despachados</button>
                            <button class="btn btn-focus">Otros</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center text-muted">#345</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img class="rounded-circle" src="assets/images/avatars/4.jpg" alt="" width="40">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">John Doe</div>
                                            <div class="widget-subheading opacity-7">Web Developer</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="badge badge-warning">Pending</div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted">#347</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img class="rounded-circle" src="assets/images/avatars/3.jpg" alt="" width="40">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Ruben Tillman</div>
                                            <div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Berlin</td>
                            <td class="text-center">
                                <div class="badge badge-success">Completed</div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted">#321</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img class="rounded-circle" src="assets/images/avatars/2.jpg" alt="" width="40">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Elliot Huber</div>
                                            <div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">London</td>
                            <td class="text-center">
                                <div class="badge badge-danger">In Progress</div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted">#55</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img class="rounded-circle" src="../css/assets/images/avatars/1.jpg" alt="" width="40"></div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Vinnie Wagstaff</div>
                                            <div class="widget-subheading opacity-7">UI Designer</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Amsterdam</td>
                            <td class="text-center">
                                <div class="badge badge-info">On Hold</div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                    <button class="btn-wide btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Income Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-success">54%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Expenses Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Spendings Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-info">89%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Totals Target</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#msj_cargando').hide();
        $('#msj_load_detalle').hide();
        $('#div_subcat_detalle').hide();

        $("#sel_proyecto").change(function(){
            var proy = $(this).val();
            $.post("../?action=load_cbo",{opt:"dpto", proy:proy}, function(data){
                $("#sel_dpto").html(data);
            });
        })

        $("#sel_dpto, #sel_proyecto, #sel_uexpl").change(function(){
            var form_data = $('#form_gen_filtro').serializeArray();
            /* Carga data para tabla general */
            $.ajax({
                url: "../?action=load_data_pres_general",
                type: "POST",
                data: $.param(form_data),
                beforeSend: function(e){
                    $('#msj_cargando').show();
                },
                error: function(xhr,textStatus,err){
                    $("#tbl_general").css("display","none");
                },
                success: function(data) {
                    $("#tbl_general").html(data);
                    
                    $('#table_prueba tr > *:nth-child(5)').hide();
                    $('#table_prueba tr > *:nth-child(9)').hide();
                    $('#table_prueba tr > *:nth-child(13)').hide();
                    $('#table_prueba tr > *:nth-child(17)').hide();
                    
                    $('[data-toggle="tooltip"]').tooltip();  

                    $(".det-subcat").click(function(e){
                        var form_data = $('#form_gen_filtro').serializeArray();
                        var subcat_id = $(this).data("xid");
                        var mes = $(this).data("mes");
                        form_data.push({name: "subcat_id", value: subcat_id});
                        form_data.push({name: "mes", value: mes});

                        /* Evento al hacer clic en detalle */
                        $.ajax({
                            url: "../?action=get_subcat_lineas",
                            type: "POST",
                            data: $.param(form_data),
                            beforeSend: function(e){
                                $('#msj_cargando').show();
                                $('#msj_load_detalle').show();
                                $('#div_subcat_detalle').show();
                            },
                            error: function(){
                                $("#tbl_general").css("display","none");
                            },
                            success: function(data) {
                                $("#div_subcat_detalle").html(data);
                                $(".btn-close-div-detalle").click(function(e){
                                    $("#div_subcat_detalle").removeClass("settings-open");
                                    // $('#div_subcat_detalle').hide();
                                    $('#msj_load_detalle').hide();
                                })


                            },
                            complete: function(){
                                $('#msj_cargando').hide();
                            }
                        })                        
                        
                        $("#div_subcat_detalle").addClass("settings-open");
                        // $("#div_subcat_detalle").show();
                    })
                    $('#msj_cargando').hide();
                    $("#sel_lin_estado").change();
                },
                complete: function(){
                    $(".toggler").click(function(e){
                        $('.cat'+ $(this).attr('data-prod-cat')).toggle();
                        icon = $(this).find("i"); 
                        icon.toggleClass("fa-minus-circle fa-plus-circle");                          
                    });
                    $('.subcat').toggle();
                    $('.cta-presup').toggle();
                    // $('#msj_cargando').hide();
                }
            })
        });

        $("#sel_lin_estado").change(function(){
            var form_data = $('#form_gen_filtro').serializeArray();

            var lin_estado = $(this).val();
            form_data.push({name: "lin_estado", value: lin_estado});

            /* Carga data para tabla de lineas con OC pendiente */
            $.ajax({
                url: "../?action=load_data_lin_oc_pend",
                type: "POST",
                data: $.param(form_data),
                beforeSend: function(e){
                    $('#msj_cargando').show();
                },
                error: function(xhr,textStatus,err){
                    $("#tbl_lin_oc_pend").css("display","none");
                },
                success: function(data) {
                    $("#tbl_lin_oc_pend").html(data);
                                        
                    $('[data-toggle="tooltip"]').tooltip();  
                    $('#msj_cargando').hide();
                },
                complete: function(){

                }
            })
        });

        $("input[name='opt_vista']").click(function(){
            var radioValue = $("input[name='opt_vista']:checked").val();
            if(radioValue == 2){
                $('.cta-presup').show();
                $('.cta-real').hide();
            }
            else if(radioValue == 1){
                $('.cta-real').show();
                $('.cta-presup').hide();
            }   
            else{

            }
        });

        $("input[name='opt_mes']").click(function(){
            var radioValue = $("input[name='opt_mes']:checked").val();
            if(radioValue == 1){
                $('#table_prueba tr > *:nth-child(2)').show();
                $('#table_prueba tr > *:nth-child(3)').show();
                $('#table_prueba tr > *:nth-child(4)').show();
                $('#table_prueba tr > *:nth-child(6)').show();
                $('#table_prueba tr > *:nth-child(7)').show();
                $('#table_prueba tr > *:nth-child(8)').show();
                $('#table_prueba tr > *:nth-child(10)').show();
                $('#table_prueba tr > *:nth-child(11)').show();
                $('#table_prueba tr > *:nth-child(12)').show();
                $('#table_prueba tr > *:nth-child(14)').show();
                $('#table_prueba tr > *:nth-child(15)').show();
                $('#table_prueba tr > *:nth-child(16)').show();

                $('#table_prueba tr > *:nth-child(5)').hide();
                $('#table_prueba tr > *:nth-child(9)').hide();
                $('#table_prueba tr > *:nth-child(13)').hide();
                $('#table_prueba tr > *:nth-child(17)').hide();
            }
            else if(radioValue == 2){
                $('#table_prueba tr > *:nth-child(2)').hide();
                $('#table_prueba tr > *:nth-child(3)').hide();
                $('#table_prueba tr > *:nth-child(4)').hide();
                $('#table_prueba tr > *:nth-child(6)').hide();
                $('#table_prueba tr > *:nth-child(7)').hide();
                $('#table_prueba tr > *:nth-child(8)').hide();
                $('#table_prueba tr > *:nth-child(10)').hide();
                $('#table_prueba tr > *:nth-child(11)').hide();
                $('#table_prueba tr > *:nth-child(12)').hide();
                $('#table_prueba tr > *:nth-child(14)').hide();
                $('#table_prueba tr > *:nth-child(15)').hide();
                $('#table_prueba tr > *:nth-child(16)').hide();

                $('#table_prueba tr > *:nth-child(5)').show();
                $('#table_prueba tr > *:nth-child(9)').show();
                $('#table_prueba tr > *:nth-child(13)').show();
                $('#table_prueba tr > *:nth-child(17)').show();
            }   
            else{

            }
        });
    });
</script>

