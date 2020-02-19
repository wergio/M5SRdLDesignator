# M5S RdL Designator
Realizzato da Daniele Vergini (M5S Forlì)

Questa applicazione web in PHP permette di generare facilmente le nomine per rappresentanti di lista del MoVimento 5 Stelle partendo da un semplice foglio di calcolo. L'implementazione è abbastanza semplice, sicuramente migliorabile, ma efficace. Lo aggiorno in occasione delle varie tornate elettorali.

# Da dove deriva la necessità di questo programma?
Alcuni Comuni permettono di presentare un unico modulo cumulativo con tutti i nomi dei rappresentanti di lista, ma altri richiedono esplicitamente un modulo per ogni seggio, questo programmino viene incontro all'esigenza di automatizzare questa operazione che richiederebbe molto tempo, e compila automaticamente i moduli di designazione dei rappresentanti di lista per i vari seggi prelevando i dati da un file excel e generando un unico file PDF da stampare, le designazioni saranno quindi solo da firmare e timbrare.

# Installazione
Il programma funziona con PHP >= 7.1 e non necessita di database, è necessaria la presenza dell'estensione php-zip per caricare gli xlsx e servono anche altre librerie solitamente installate nelle comuni installazioni php. Per installarlo basta copiarlo in una directory del vostro sito web, attualmente è disponibile sempre l'ultima versione su http://www.movimento5stelleforli.it/rdldesignator/ nota bene: nessun dato viene salvato ma vengono utilizzati solo per generare il PDF. E' inolte possibile eseguire l'applicazione in locale sul vostro PC se avete PHP installato con:
```
cd <directory dove avete scaricato il codice>
php -S localhost:8000
```
e l'interfaccia sarà raggiungibile all'url `http://localhost:8000/`.

Non esitate a contattarmi per domande, segnalazione bug e richieste di customizzazione.