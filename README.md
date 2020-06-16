# PrintNode
PHP 7.1 API library for PrintNode - Remote Printing for Web Apps https://www.printnode.com/

```php
$printNode = new PrintNode(string $auth);
```

## [Account Information](https://www.printnode.com/en/docs/api/curl#account-information)
### [Who Am I?](https://www.printnode.com/en/docs/api/curl#whoami)
```php
// GET /whoami
$printNode->getWhoAmI(); // returns WhoAmIResponse
```

## [Computers](https://www.printnode.com/en/docs/api/curl#computers)
### [Viewing](https://www.printnode.com/en/docs/api/curl#computers-viewing)
```php
// GET /computers
$printNode->getComputers(); // returns ComputersResponse

// GET /computers/COMPUTER SET
$printNode->getComputer(int $computer); // returns ComputerResponse
```

### [Removing](https://www.printnode.com/en/docs/api/curl#computers-removing)
```php
// DELETE /computers
$printNode->deleteComputers(); // returns DeleteConfirmationResponse

// DELETE /computers/COMPUTER SET
$printNode->deleteComputers(int|array $computers); // returns DeleteConfirmationResponse
```

## [Printers](https://www.printnode.com/en/docs/api/curl#printers)
### [Viewing](https://www.printnode.com/en/docs/api/curl#printers-viewing)
```php
// GET /printers
$printNode->getPrinters(); // returns PrintersResponse

// GET /printers/PRINTER SET
$printNode->getPrinter(int $printer); // returns PrinterResponse

// GET /computers/COMPUTER SET/printers
$printNode->getComputerPrinters(int $computer); // returns PrintersResponse

// GET /computers/COMPUTER SET/printers/PRINTER SET
$printNode->getComputerPrinter(int $computer, int $printer); // returns PrinterResponse
```

### [Removing](https://www.printnode.com/en/docs/api/curl#printers-removing)
```php
// DELETE /printers
$printNode->deletePrinters(); // returns DeleteConfirmationResponse

// DELETE /printers/PRINTER SET
$printNode->deletePrinters(int|array $printers); // returns DeleteConfirmationResponse

// DELETE /computers/COMPUTER SET/printers
$printNode->deleteComputerPrinters(int $computer); // returns DeleteConfirmationResponse

// DELETE /computers/COMPUTER SET/printers/PRINTER SET
$printNode->deleteComputerPrinters(int $computer, int|array $printers); // returns DeleteConfirmationResponse
```

## [Print Jobs](https://www.printnode.com/en/docs/api/curl#printjobs)
### [Creating](https://www.printnode.com/en/docs/api/curl#printjob-creating)
```php
// GET /printjobs
$printJobFile = $printNode->createPrintJobFile(int $printer, string $title, string $source); // returns PrintJobFile
$printJobFile->send('path/to/file.pdf'); // returns Print Job ID

$printJobFile = $printNode->createPrintJobPdfSource(int $printer, string $title, string $source); // returns PrintJobFile
$printJobFile->send($pdfSource); // returns Print Job ID

$printJobUrl = $printNode->createPrintJobUrl(int $printer, string $title, string $source); // returns PrintJobUrl
$printJobUrl->send('https://www.domain.com/path/to/file.pdf'); // returns Print Job ID
```

### [Viewing](https://www.printnode.com/en/docs/api/curl#printjob-viewing)
```php
// GET /printjobs

// GET /printjobs/PRINT JOB SET

// GET /printers/PRINTER SET/printjobs

// GET /printers/PRINTER SET/printjobs/PRINT JOB SET

```

### [Removing](https://www.printnode.com/en/docs/api/curl#printjobs-removing)
```php
// DELETE /printjobs

// DELETE /printjobs/PRINT JOB SET

// DELETE /printers/PRINTER SET/printjobs

// DELETE /printers/PRINTER SET/printjobs/PRINT JOB SET

```

### [States](https://www.printnode.com/en/docs/api/curl#printjob-states)
```php
// GET /printjobs/states

// GET /printjobs/PRINT JOB SET/states

```

## [Scales](https://www.printnode.com/en/docs/api/curl#scales)
### [HTTP REST](https://www.printnode.com/en/docs/api/curl#scales-http)
```php
// GET /computer/COMPUTER ID/scales

// GET /computer/COMPUTER ID/scales/DEVICE NAME

// GET /computer/COMPUTER ID/scale/DEVICE NAME/DEVICE NUMBER

```

### [Testing](https://www.printnode.com/en/docs/api/curl#scales-testing)
```php
// PUT /scale

```

## [Account Management](https://www.printnode.com/en/docs/api/curl#account-management)
### [Creating](https://www.printnode.com/en/docs/api/curl#account-creation)
```php
// POST /account
$newAccount = $printNode->createAccount('email@domain.com', 'my-passw0rd'); // returns ChildAccountRequest
$newAccount
  ->setCreatorRef('my-unique-reference')
  ->addTag('likes', 'dogs')
  ->addTags([
      'eats' => 'pie',
      'plays' => 'football',
  ])
  ->removeTag('eats')
  ->addApiKey('development')
  ->addApiKeys([
      'staging',
      'production',
  ])
  ->removeApiKey('development');
  
$newAccount->send(); // returns ChildAccountResponse
```

### [Modifying](https://www.printnode.com/en/docs/api/curl#account-modification)
```php
// PATCH /account

```

### [Suspending and Activating](https://www.printnode.com/en/docs/api/curl#account-suspension)
```php
// PUT /account/state
$childAccount = $printNode->getChildAccount($id); // returns PrintNode
$childAccount->suspend();
$childAccount->activate();
```

### [Deleting](https://www.printnode.com/en/docs/api/curl#account-deletion)
```php
// DELETE /account
$childAccount = $printNode->getChildAccount($id); // returns PrintNode
$childAccount->delete();
```

### [Controlling](https://www.printnode.com/en/docs/api/curl#account-controlling)
```php
$childAccount = $printNode->getChildAccount($id); // returns PrintNode
// or
$childAccount = $printNode->getChildAccount($email, PrintNode::$CHILD_AUTH_BY_EMAIL); // returns PrintNode
// or
$childAccount = $printNode->getChildAccount($creatorRef, PrintNode::$CHILD_AUTH_BY_CREATOR_REF); // returns PrintNode
```

### [Tagging](https://www.printnode.com/en/docs/api/curl#account-tagging)
```php
// POST /account/tag/NAME

// GET /account/tag/NAME

// DELETE /account/tag/NAME

```

### [API Keys](https://www.printnode.com/en/docs/api/curl#account-apikeys)
```php
// POST /account/apikey/DESCRIPTION

// GET /account/apikey/DESCRIPTION

// DELETE /account/apikey/DESCRIPTION

```

### [Client Downloads](https://www.printnode.com/en/docs/api/curl#account-download-management)
```php
$clientKey = $childAccount->getClientKey($uuid, $edition, $version); // returns string 
```

## [Miscellaneous](https://www.printnode.com/en/docs/api/curl#misc)
### [Ping](https://www.printnode.com/en/docs/api/curl#misc-ping)
```php
// GET /ping
PrintNode::ping(); // returns true/false
```

### [Noop](https://www.printnode.com/en/docs/api/curl#misc-noop)
```php
// GET /noop
$printNode->noop(); // returns true/false
```
