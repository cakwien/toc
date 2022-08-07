<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Progress Peserta
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="datatabel">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peserta</th>
                            <th>Jadwal</th>
                            <th>Start</th>
                            <th>Progress</th> 
                            <th>Opsi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($listprogress as $row)
                            {
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nm_siswa']?></td>
                            <td><?=$row['jadwal']?></td>
                            <td><?=date('d/m/Y H:i:s',$row['start'])?></td>
                            <td></td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="bi-trash"></i></button>
                                <button class="btn btn-primary btn-sm"><i class="bi-search"></i></button>
                            </td>
                        </tr>
                        <?php $no++; } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>