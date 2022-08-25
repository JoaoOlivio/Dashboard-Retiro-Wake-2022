<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 flex-title-table">
            <h4 class="m-0 font-weight-bold text-primary">Retirantes</h4>

            <button name="cadastroPessoa" type="button"  class="btn btn-primary btn-icon-split font-button-add" data-bs-toggle="modal" data-bs-target="#cadastroPessoa">
                <span class="icon text-white-50">
                    <i class="far fa-plus-circle"></i>
                </span>
                <span class="text">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Novo Retirante</font>
                    </font>
                </span>
            </button>

        </div>
        <?php
        
        $i = 1;
        $query = "SELECT * FROM pessoas WHERE pessoa_status = 'Confirmado' AND pessoa_tipo = 'Retirante' OR  pessoa_status = 'Pendente' AND pessoa_tipo = 'Retirante'";
        $query_run = mysqli_query($conexao, $query);

        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dt-responsive" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Igreja</th>
                            <th>Detalhes</th>
                            <th>Inscrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $pessoa_id = $row['pessoa_id'];
                                $pessoa_nome = $row['pessoa_nome'];
                                $pessoa_status = $row['pessoa_status'];
                                $pessoa_celular = $row['pessoa_celular'];
                                $pessoa_igreja = $row['pessoa_igreja'];
                                $pessoa_idade = $row['pessoa_idade'];
                                $pessoa_pagamento = $row['pessoa_lote'];

                        ?>

                                <tr>
                                    <td class="text-center"><b><?php echo $i++ ?></b></td>
                                    <td><?php echo $row['pessoa_nome']; ?></td>
                                    <td><small class="small-detalhes"><?php echo $row['pessoa_igreja'] ?></small><br></td>
                                    <td>
                                        <small class="small-detalhes"><b>Idade:</b> <?php echo $row['pessoa_idade'] ?></small><br>
                                        <small class="small-detalhes"><b>Contato #:</b> <?php echo $row['pessoa_celular']; ?></small><br>
                                    </td>

                                    <?php if ($row['pessoa_status'] == 'Confirmado') {
                                        echo "<td><span class='badge badge-pill badge-success badge-font'>$pessoa_status</span><small class='small-detalhes'><b>Pagamento:</b> $pessoa_pagamento</small><br></td>";
                                    } else {
                                        echo "<td><span class='badge badge-pill badge-warning badge-font'>$pessoa_status</span><small class='small-detalhes'><b>Pagamento:</b> $pessoa_pagamento</small><br></td>";
                                    };
                                    ?>

                                    <td>
                                        <div class='btn-group align-top mx-auto'>
                                            <?php if ($pessoa_status == "Pendente") { ?>
                                                <button type="button" class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?php echo $row['pessoa_id']; ?>" data-bs-whatevernome="<?php echo $row['pessoa_nome']; ?>" data-bs-whateveremail="<?php echo $row['pessoa_email']; ?>" data-bs-whateverpagamento="<?php echo $row['pessoa_lote']; ?>" data-bs-whateverstatus="<?php echo $row['pessoa_status']; ?>"><i class="fas fa-edit"></i></button>
                                            <?php } ?>
                                            <button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#modal_Excluir' onclick="get_dados('<?php echo $row['pessoa_id']; ?>','<?php echo $row['pessoa_nome']; ?>')" type='button'><i class='fa fa-trash'></i></button>
                                        </div>
                                    </td>
                                </tr>

                        <?php
                            }
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Nenhuma informação encontrada!</div>";
                        }

                        ?>
                    </tbody>
                </table>

                <!-- Modal EXCLUIR DADOS-->
                <div class="modal fade" id="modal_Excluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                            </div>
                            <div class="modal-body">
                                <form action="../admin/acoes/exclusao.php" method="POST">

                                    <input type="hidden" name="pessoa_nome" id="empresa_url_1" value="">
                                    <input type="hidden" name="pessoa_id" id="convidados_ida" value="">
                                    <p><span>Você realmente deseja excluir da lista ?</span></p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>

                                        <input name="btn-fechar-excluir" type="submit" class="btn btn-primary" value="Sim">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- MODAL EDITAR DADOS -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../admin/acoes/editar.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nome</label>
                                <input name="nome" type="text" class="form-control" id="convidados_nome">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input name="email" type="text" class="form-control" id="retirante_email">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Método Pagamento</label>
                                <input name="pagamentos" type="text" class="form-control" id="pessoa_pagamento">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Status Pagamento</label>
                                <!-- <input name="status" type="text" class="form-control" id="pessoa_status"> -->
                                <select name="status" class="form-control" aria-label="Selecione Status Atual">
                                    <!-- <option name="status" value="Pendente" selected>Selecione Status Atual</option> -->
                                    <option name="status" value="Pendente">Pendente</option>
                                    <option name="status" value="Confirmado">Confirmado</option>
                                </select>
                            </div>

                            <input name="id" type="hidden" class="form-control" id="convidados_id">
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" name="btn-fechar" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>


        <!-- MODAL Cadastrar Pessoas -->
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="cadastroPessoa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Retirante</h5>
                        </div>
                        <div class="modal-body">

                            <form method="POST" action="../admin/acoes/adicionar.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Nome</label>
                                        <input type="hidden" class="form-control form-control-user" name="pessoa_tipo" value="Retirante" required>
                                        <input type="hidden" class="form-control form-control-user" name="pessoa_area" value="Nenhuma" required>

                                        <input type="text" class="form-control form-control-user" name="pessoa_nome" placeholder="Ex: João" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-user" name="pessoa_email" placeholder="Ex: joao@gmail.com" required>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Idade</label>
                                        <input type="text" class="form-control form-control-user" name="pessoa_idade" placeholder="Ex: 20" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Igreja</label>
                                        <input type="text" class="form-control form-control-user" name="pessoa_igreja" placeholder="Ex: PIB Vargem Alta" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Celular</label>
                                        <input type="text" class="form-control form-control-user" name="pessoa_celular" placeholder="Ex: 28 999999999" required>
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Método de Pagamento</label>
                                        <input type="text" class="form-control form-control-user" name="pessoa_lote" placeholder="Ex: Pix, Carnê" required>
                                    </div> 
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button name="cadastroPessoa" type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    //EXCLUIR
    function get_dados(id, url) {
        document.getElementById('convidados_nome').innerHTML = url;
        document.getElementById('empresa_url_1').value = url;
        document.getElementById('convidados_ida').value = id;
    }
</script>

<script type="text/javascript">
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        var recipientnome = button.getAttribute('data-bs-whatevernome')
        var recipientemail = button.getAttribute('data-bs-whateveremail')
        var recipientepagamento = button.getAttribute('data-bs-whateverpagamento')
        var recipientestatus = button.getAttribute('data-bs-whateverstatus')

        var modalTitle = exampleModal.querySelector('.modal-title')
        var id = exampleModal.querySelector('#convidados_id')
        var nome = exampleModal.querySelector('#convidados_nome')
        var email = exampleModal.querySelector('#retirante_email')
        var pagamento = exampleModal.querySelector('#pessoa_pagamento')
        var status = exampleModal.querySelector('#pessoa_status')

        modalTitle.textContent = 'Editar dados de ' + recipientnome
        id.value = recipient
        nome.value = recipientnome
        email.value = recipientemail
        pagamento.value = recipientepagamento
        status.value = recipientestatus

    })
</script>


<!-- /.container-fluid -->