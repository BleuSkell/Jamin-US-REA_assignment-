<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het boodstrap grid -->
<div class="container">

    <div class="row mt-3 text-center" style="display:<?= $data['messageVisibility']; ?>">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
        <div class="col-2"></div>
    </div>


    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h2><?php echo $data['title']; ?></h2>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <?php if (isset($data['dataRows'])) : ?>
                <h5>Naam Leverancier: <?= $data['dataRows'][0]->LeverancierNaam ?></h5>
                <h5>Contactpersoon Leverancier: <?= $data['dataRows'][0]->LeverancierContact ?></h5>
                <h5>Leverancier nummer: <?= $data['dataRows'][0]->LeverancierNummer ?></h5>
                <h5>Mobiel: <?= $data['dataRows'][0]->LeverancierMobiel ?></h5>
            <?php endif; ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Naam Product</th>
                        <th>AantalIn Magazijn</th>
                        <th>Verpakkings Eenheid</th>
                        <th>Laatste Levering</th>
                        <th>Nieuwe levering</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['dataRows'])) { ?>
                              <tr>
                                <td colspan='6' class='text-center'><?= $data['message']; ?></td>
                              </tr>
                    <?php } else {                              
                              foreach ($data['dataRows'] as $leverancier) { ?>
                                <?php if($data['message']) : ?>
                                    <td colspan="6" class="text-center"><?=$data['message'];?></td>
                                <?php else : ?>
                                    <tr>
                                    <td><?= $leverancier->ProductNaam ?></td>
                                    <td><?= $leverancier->AantalAanwezig ?></td>
                                    <td><?= $leverancier->VerpakkingsEenheid ?></td>
                                    <td><?= $leverancier->LaatsteLevering ?></td>   
                                    <td class='text-center'>
                                        <a href='<?= URLROOT . "/Leverancier/levering/$leverancier->LeverancierId" ?>'>
                                            <i class='bi bi-plus'></i>
                                        </a>
                                    </td>          
                                    </tr>
                                <?php endif; ?>
                    <?php } } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a> |
            <a href="<?= URLROOT; ?>/leverancier/index">Leveranciers</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>