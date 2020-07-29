<?php
	$u=null;
	if(Session::getUID()!=""){
	    $u = UserData::getById(Session::getUID());
	    $idusuario = $u->id;
        $tipo_usuario = $u->user_type;

        $uexp_id = $_POST["campus"];
        $periodo_id = $_POST["periodo"];

        $text_title = "";
        $bg_title = "";

        $result_incprio_lista;
        switch ($tipo_usuario) {
            case 3: /* Katya y Diana */
                $result_locales = LocalData::getLocalAllActive_ByCampus($uexp_id);
                $result_unidad_mant_pmp = UMantData::getUMantPMPAllActive();
                $result_unidad_mant_gen = UMantData::getUMantGENAllActive();
                break;
            
            default:
                $result_incprio_lista = null;
                break;
        }

	}
	else{
	    echo "<script>window.location='index.php';</script>";
	}
?>
<style type="text/css">

</style>

<?php
foreach ($result_locales as $row_local) {
?>
    <div class="col-md-12">
        <div class="main-card mb-3 card div_local">
            <div class="card-header-tab card-header bg-warning">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-dark"> </i>
                    <h3><b><?php echo $row_local->Loc_vNombreLocal; ?></b></h3>
                </div>

                <div class="btn-actions-pane-right">
                   <div class="nav">
                        <a data-toggle="tab" class="border-0 btn-pill btn-wide btn-transition btn btn-outline-alternate active  btn_local_pmp">PMP</a>
                        <a data-toggle="tab" class="ml-1 btn-pill btn-wide border-0 btn-transition btn btn-outline-alternate btn_local_gen">General</a>
                    </div>
                </div>

            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show tab_local_pmp">
                    <div class="table-responsive">
                        <table class="align-middle mt-2 table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">Unidad de Mantenimiento</th>
                                <th class="text-center">Frecuencia</th>
                                <th class="text-center">ENE</th>
                                <th class="text-center">FEB</th>
                                <th class="text-center">MAR</th>
                                <th class="text-center">ABR</th>
                                <th class="text-center">MAY</th>
                                <th class="text-center">JUN</th>
                                <th class="text-center">JUL</th>
                                <th class="text-center">AGO</th>
                                <th class="text-center">SET</th>
                                <th class="text-center">OCT</th>
                                <th class="text-center">NOV</th>
                                <th class="text-center">DIC</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result_unidad_mant_pmp as $row_unidad_mant_pmp) {
                                $icono = $row_unidad_mant_pmp->Esp_vIcono;
                                

                                switch ($row_unidad_mant_pmp->UMan_nFrecuencia) {
                                    case 1:
                                        $frecuencia = "Mensual";
                                        break;
                                    case 2:
                                        $frecuencia = "Bimestral";
                                        break;
                                    case 3:
                                        $frecuencia = "Trimestral";
                                        break;
                                    case 6:
                                        $frecuencia = "Semestral";
                                        break;
                                    case 8:
                                        $frecuencia = "Octomestral";
                                        break;
                                    case 12:
                                        $frecuencia = "Anual";
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            ?>
                            <tr>
                                <!-- UNIDAD MTO -->
                                <td class="p-0 m-0">
                                    <div class="widget-content p-0 m-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-content-left pl-3">
                                                    <!-- <div class="font-icon-wrapper"> -->
                                                        <i class="fa <?php echo $icono; ?> fa-1x" aria-hidden="true"></i>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading ml-2"> <?php echo $row_unidad_mant_pmp->UMan_vDescripcion; ?></div>
                                                <!-- <div class="widget-subheading opacity-7"><?php echo $row_unidad_mant_pmp->Esp_vNombre; ?></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- FRECUENCIA -->
                                <td class="text-center"> <?php echo $frecuencia; ?> </td>
                                
                                <!-- MESES  -->
                                <?php 
                                for ($i=1; $i <=12 ; $i++) { 
                                    $temp_busca_detalle_pmp = UMantData::getUMantPMP_ByLocal_UMant_Periodo_Mes($row_local->Loc_nIdLocal, $row_unidad_mant_pmp->UMan_nIdUMan, $periodo_id, $i);
                                    $temp_pmp = "&nbsp;";
                                    // var_dump($temp_busca_detalle_pmp->DetPmp_cEstado);
                                    if(isset($temp_busca_detalle_pmp->DetPmp_cEstado)){
                                        switch ($temp_busca_detalle_pmp->DetPmp_cEstado) {
                                            case 1:
                                                $temp_pmp = '<i class="text-success fa-1x fa fa-check-circle pmp_det" aria-hidden="true"></i>';
                                                break;

                                            case 2:
                                                $temp_pmp = '<i class="text-warning fa-1x fa fa-history pmp_det" aria-hidden="true"></i>';
                                                break;

                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                    }
                                ?>

                                <td class="text-center">
                                    <?php echo $temp_pmp; ?>
                                </td>
                                
                                <?php
                                }
                                ?>                              

                                <!-- <td class="text-center">
                                    <i class="text-success fa-1x fa fa-check-circle" aria-hidden="true"></i>  
                                </td>

                                <td class="text-center">
                                    <i class="text-warning fa-1x fa fa-history" aria-hidden="true"></i>
                                </td>
 -->
                            </tr>

                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>


                    <div class="div_local_pmp_detalle">
                        <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Basic Tree Example</h5>
                                    <div id="tree"><ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0" role="tree" aria-multiselectable="true" aria-activedescendant="ui-id-1"><li role="treeitem" aria-expanded="true" aria-selected="false" id="ui-id-1"><span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Books</span></span><ul role="group"><li role="treeitem" aria-selected="false"><span class="fancytree-node fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Art of War</span></span></li><li role="treeitem" aria-selected="false"><span class="fancytree-node fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">The Hobbit</span></span></li><li role="treeitem" aria-selected="false"><span class="fancytree-node fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">The Little Prince</span></span></li><li role="treeitem" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c"><span class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Don Quixote</span></span></li></ul></li><li role="treeitem" aria-expanded="false" aria-selected="false"><span class="fancytree-node fancytree-folder fancytree-has-children fancytree-exp-c fancytree-ico-cf"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Music</span></span></li><li role="treeitem" aria-expanded="true" aria-selected="false"><span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Electronics &amp; Computers</span></span><ul role="group"><li role="treeitem" aria-expanded="false" aria-selected="false"><span class="fancytree-node fancytree-folder fancytree-has-children fancytree-exp-c fancytree-ico-cf"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Cell Phones</span></span></li><li role="treeitem" aria-expanded="false" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-cl fancytree-ico-cf"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Computers</span></span></li></ul></li><li role="treeitem" aria-expanded="false" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-folder fancytree-has-children fancytree-lastsib fancytree-lazy fancytree-exp-cdl fancytree-ico-cf"><span role="button" class="fancytree-expander"></span><span role="checkbox" class="fancytree-checkbox"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">More...</span></span></li></ul></div>
                                </div>
                            </div>
                    </div>

                </div>

                <!-- TAB MANT. GENERALES -->
                <div class="tab-pane tab_local_gen">
                    <div class="table-responsive">
                        <table class="align-middle mt-2 table table-borderless table-striped table-hover ">
                            <thead>
                            <tr>
                                <th class="text-center">Unidad de Mantenimiento</th>
                                <th class="text-center">Frecuencia</th>
                                <th class="text-center">ENE</th>
                                <th class="text-center">FEB</th>
                                <th class="text-center">MAR</th>
                                <th class="text-center">ABR</th>
                                <th class="text-center">MAY</th>
                                <th class="text-center">JUN</th>
                                <th class="text-center">JUL</th>
                                <th class="text-center">AGO</th>
                                <th class="text-center">SET</th>
                                <th class="text-center">OCT</th>
                                <th class="text-center">NOV</th>
                                <th class="text-center">DIC</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result_unidad_mant_gen as $row_unidad_mant_gen) {
                                $icono = $row_unidad_mant_gen->Esp_vIcono;

                                switch ($row_unidad_mant_gen->UMan_nFrecuencia) {
                                    case 1:
                                        $frecuencia = "Mensual";
                                        break;
                                    case 2:
                                        $frecuencia = "Bimestral";
                                        break;
                                    case 3:
                                        $frecuencia = "Trimestral";
                                        break;
                                    case 6:
                                        $frecuencia = "Semestral";
                                        break;
                                    case 8:
                                        $frecuencia = "Octomestral";
                                        break;
                                    case 12:
                                        $frecuencia = "Anual";
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            ?>
                            <tr>
                                <!-- UNIDAD MTO -->
                                <td class="p-0 m-0">
                                    <div class="widget-content p-0 m-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-content-left pl-3">
                                                    <!-- <div class="font-icon-wrapper"> -->
                                                        <i class="fa <?php echo $icono; ?> fa-1x" aria-hidden="true"></i>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading ml-2"> <?php echo $row_unidad_mant_gen->UMan_vDescripcion; ?></div>
                                                <!-- <div class="widget-subheading opacity-7"><?php echo $row_unidad_mant_gen->Esp_vNombre; ?></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- FRECUENCIA -->
                                <td class="text-center"> <?php echo $frecuencia; ?> </td>
                                
                                <!-- ENERO -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- FEBRERO -->    
                                <td class="text-center">
                                    <i class="text-success fa-1x fa fa-check-circle" aria-hidden="true"></i>  
                                </td>

                                <!-- MARZO -->    
                                <td class="text-center">
                                    <i class="text-warning fa-1x fa fa-history" aria-hidden="true"></i>
                                </td>

                                <!-- ABRIL -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- MAYO -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- JUNIO -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- JULIO -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- AGOSTO -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- SETIEMBRE -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- OCTUBRE -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- NOVIEMBRE -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                                <!-- DICIEMBRE -->    
                                <td class="text-center">
                                    &nbsp;
                                </td>

                            </tr>

                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
// break;
}
?>

<script type="text/javascript">
    // $(this).parents('ul.sub1').find('ul');
    
    $(".btn_local_pmp").click(function(){
        var temp = $(this).parents('div.div_local').find('div.tab_local_pmp');
        var temp2 = $(this).parents('div.div_local').find('div.tab_local_gen');
        // console.log("HI");
        temp2.hide();
        temp.show();
    })

    $(".btn_local_gen").click(function(){
        var temp = $(this).parents('div.div_local').find('div.tab_local_pmp');
        var temp2 = $(this).parents('div.div_local').find('div.tab_local_gen');
        // console.log("HI");
        temp.hide();
        temp2.show();
    })

    $(".pmp_det").click(function(){
        var temp = $(this).parents('div.tab_local_pmp').find('div.div_local_pmp_detalle');
        // temp.show();
        temp.html("");
    })

</script>
