
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informações Gerais</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Retirantes Confirmados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                        <?php
                            $query = "SELECT pessoa_id FROM pessoas  WHERE pessoa_status ='Confirmado' AND pessoa_tipo = 'Retirante'";
                            $query_row = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($query_row);
                            echo '<h4>' . $row . '</h4>';
                        ?>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pagamentos Pendentes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> 

                            <?php

                                $query = "SELECT pessoa_id FROM pessoas  WHERE pessoa_status ='Pendente' AND pessoa_tipo = 'Retirante'";
                                $query_row = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($query_row);
                                echo '<h4>' . $row . '</h4>';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->