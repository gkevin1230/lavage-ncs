<?php
require_once "config.php";

if (isset($_GET['num_serie'])) {
    $num_serie = $_GET['num_serie'];

    // Récupérez les informations du conteneur de la base de données
    $sql = "SELECT * FROM conteneur WHERE num_serie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $num_serie);
    $stmt->execute();
    $result = $stmt->get_result();
    $conteneur = $result->fetch_assoc();
    $stmt->close();

    // Créez le fichier XML
    $xml = new SimpleXMLElement('<xml/>');
    $transactions = $xml->addChild('transactions');
    $transaction = $transactions->addChild('transaction');
    $transaction->addAttribute('date', date('Y-m-d'));
    $document = $transaction->addChild('document');
    $document->addAttribute('aliasset', 'PF');
    $configuration = $document->addChild('configuration');
    $configuration->addAttribute('name', 'Default');
    $configuration->addAttribute('matrice', 'OP');

    $attributes = [
        'ARKTCODART' => 'OPTESTFL',
        'ARKTCOMART' => '',
        'ARCTLIB01' => 'Conteneur Inox Test',
    ];

    foreach ($attributes as $key => $value) {
        $attribute = $configuration->addChild('attribute');
        $attribute->addAttribute('name', $key);
        $attribute->addAttribute('value', $value);
    }

    $references = $configuration->addChild('references');
    $ref_document = $references->addChild('document');
    $ref_document->addAttribute('aliasset', 'Ligne Nomenc');
    $ref_configuration = $ref_document->addChild('configuration');
    $ref_configuration->addAttribute('name', 'CP : ' . $conteneur['num_client']);
    $ref_attributes = [
        'NOCTCODECP' => $conteneur['num_client'],
        'NOCNQTECOM' => '1',
    ];

    foreach ($ref_attributes as $key => $value) {
        $attribute = $ref_configuration->addChild('attribute');
        $attribute->addAttribute('name', $key);
        $attribute->addAttribute('value', $value);
    }

    // Téléchargez le fichier XML
    header('Content-Disposition: attachment; filename="conteneur_' . $num_serie . '.xml"');
    header('Content-Type: text/xml');
    echo $xml->asXML();
}
?>
