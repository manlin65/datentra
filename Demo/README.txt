DATENTRA DataCheck Intelligent v23 RC

NEU:
- Mehrere Dateien gleichzeitig laden.
- Excel/ODS: alle Arbeitsblätter werden als eigene Tabellen erkannt.
- XML: mehrere wiederholte Tabellen-/Elementgruppen werden automatisch erkannt.
- Datenquellen-/Tabellenbrowser links.
- Einzelne Tabelle prüfen oder alle Tabellen prüfen.
- Tabellen auswählen und per automatischem Spalten-Mapping zusammenführen.
- Projekt speichern (.datentra) und später wieder öffnen.
- Prüfprofile mit Typ, Pflichtfeld, Eindeutig, Min/Max.
- Meldungen ignorieren.
- Filter: alle / nur Probleme / nur Dubletten / nur ungeklärte Konflikte.
- Golden Records für Gruppen mit 2, 3 oder mehr Datensätzen.
- Bereinigung ansehen springt automatisch nach unten.
- Export: XLSX, CSV, XML, ODS sowie alle Tabellen gemeinsam als XLSX.
- Undo/Redo.
- Prüfbericht.
- Direkt anwählbare Beispiele.

Testdateien:
01_Mehrere_Blaetter_Demo.xlsx
02_XML_Mehrere_Tabellen.xml
03_Kunden_Import_A.csv
04_Kunden_Import_B.csv


v24:
- Dublettenprüfung erweitert: gleiche/nahezu gleiche fachliche Daten werden auch dann erkannt,
  wenn die ID-/Nummernspalten unterschiedlich sind.
- Beispiel Lieferanten L1/L2 mit gleicher Firma/PLZ/Ort wird als Duplikat-/Golden-Record-Kandidat erkannt.
- Dateiname wird im Hauptbereich deutlich angezeigt.
- Exportdateien erhalten automatisch:
  <OriginalDateiname>_<YYYY-MM-DD>_BereinigtVonDataCheck.<ext>
- Alle-Tabellen-Export:
  DATENTRA_Alle_Tabellen_<YYYY-MM-DD>_BereinigtVonDataCheck.xlsx


v25:
- Fehler beim Direktbeispiel "Mehrere Tabellen" behoben.
- Nach Klick werden Quelle, Tabellenliste, Zähler und Datenvorschau jetzt synchron aktualisiert.
- Aktuell ausgewählte Tabelle bleibt bei "Alle Tabellen prüfen" erhalten.
- Status zeigt nach Beispiel-Laden Anzahl Tabellen und Datensätze.

v26:
- Fehler "Cannot set properties of null (setting textContent)" behoben.
  Ursache: Dateiname wurde per JavaScript gesetzt, aber das Anzeigeelement fehlte im HTML.
- Klick auf ein Beispiel zeigt jetzt sofort das zugehörige Beispiel im Hauptbereich.
- Aktives Beispiel wird sichtbar markiert und im Datenbereich als "Beispiel: ..." angezeigt.
- "Mehrere Tabellen": öffnet sofort die Kunden-Tabelle, weitere Tabellen stehen links.
- "3x gleiche Firma": zeigt sofort genau diesen Golden-Record-Test.
- "Schema-Mapping": zeigt die Beispieldaten und öffnet anschließend direkt die Spaltenzuordnung.


v27:
- Workflow für Excel-Dateien mit mehreren Blättern:
  1. Blatt öffnen und prüfen
  2. Golden Records/Korrekturen durchführen
  3. "Bereinigung ansehen"
  4. "Bereinigte Daten übernehmen"
  5. zum nächsten Blatt wechseln
  6. am Ende "Fertige Excel speichern"
- Jedes ursprüngliche Tabellenblatt erscheint im Ergebnis genau einmal.
- Übernommene Blätter werden links mit "✓ übernommen" markiert.
- KPI "Blätter übernommen" zeigt den Fortschritt.
- Nach Übernahme springt DataCheck automatisch zum nächsten noch nicht bestätigten Blatt.
- Wenn nach einer Übernahme noch Änderungen gemacht werden, wird der Übernahme-Status zurückgesetzt.
- Finale Datei:
  <OriginalDateiname>_<YYYY-MM-DD>_BereinigtVonDataCheck.xlsx
- Projekt speichern (.datentra) bleibt getrennt vom finalen Excel-Export.


v28:
- Bereinigungsvorschau gehört jetzt immer sichtbar zum aktuell geöffneten Tabellenblatt.
- Beim Wechsel auf ein anderes Blatt wird die alte Bereinigungsvorschau geschlossen und geleert.
- Nach "Bereinigte Daten übernehmen" springt DataCheck zum nächsten Blatt und zeigt NICHT mehr den alten bereinigten Datensatz an.
- Die Bereinigungsvorschau zeigt Tabellenblatt und Dateiname.
- Zusätzlicher großer Button direkt bei der Bereinigung:
  "Excel mit allen Blättern speichern".
- Finale Excel enthält jedes ursprüngliche Tabellenblatt genau einmal, jeweils im übernommenen/bereinigten Stand.
- Workflow:
  Blatt 1 -> Bereinigung ansehen -> übernehmen
  Blatt 2 -> Bereinigung ansehen -> übernehmen
  Blatt 3 -> Bereinigung ansehen -> übernehmen
  danach -> Excel mit allen Blättern speichern

v29:
- Golden-Record-Erkennung für Kunden/Lieferanten erweitert:
  praktisch identische Firma + gleicher Ort reicht jetzt als starker Dublettenhinweis,
  auch wenn Straße, Telefon oder E-Mail fehlen.
- Beispiel "Kunden": Alpha GmbH / Alpha GmbH in Schwabach wird jetzt als Golden-Record-Gruppe erkannt.
- Bei 91126 + 911a5 schlägt der Golden Record 91126 als gültige PLZ vor und erklärt,
  dass 911a5 ungültig ist.

v30:
- Entscheidender Fehler in der Golden-Record-Erkennung behoben:
  "Kundennr" bzw. "Lieferantennr" wurde bisher fälschlich als Firmen-/Namensspalte erkannt,
  weil die Suche bereits auf "kunde"/"lieferant" angesprungen ist.
- Jetzt werden Nummern-/ID-Spalten ausdrücklich ausgeschlossen.
- "Firma", "Unternehmen", "Firmenname", "Kundenname", "Lieferantenname" werden korrekt als Namensspalte verwendet.
- Kunden-Beispiel Alpha GmbH + Alpha GmbH, gleicher Ort Schwabach => Golden Record wird jetzt angezeigt.
- Zusätzlich erscheint ein Hinweis "Golden-Record-Kandidat" in Prüfung & Vorschläge.


v31:
- Automatische Schema-Mapping-Erkennung zwischen geladenen Tabellen/Excel-Sheets.
- Erkennt Synonyme und fachliche Bedeutung:
  Kundennr <-> Kunden_ID
  Firma <-> Unternehmen
  PLZ <-> Postleitzahl
  Ort <-> Stadt
  E-Mail <-> Mailadresse
  usw.
- Zusätzlich werden Dateninhalte zur Typbestätigung verwendet (PLZ, E-Mail, Telefon, IBAN, USt-ID).
- Unter "Prüfung & Vorschläge" erscheint automatisch:
  "Schema-Mapping erkannt" mit Zuordnung, Sicherheit und Buttons.
- "Mapping ansehen" öffnet die vorgeschlagene Spaltenzuordnung.
- Nach "Zusammenführen" wird eine gemeinsame Tabelle erzeugt und direkt erneut auf Datenqualität,
  Dubletten und Golden Records geprüft.
- Neuer KPI "Schema-Mappings".


v33:
- Schema-Mapping wird nicht mehr ungefragt automatisch ausgeführt.
- Bei mehreren Tabellen erscheint zuerst eine Meldung:
  "Möchten Sie auf Schema-Mapping prüfen?"
- Neuer Button: "Auf Schema-Mapping prüfen".
- Erst nach Klick werden semantische Zuordnungen gesucht und als Vorschlag angezeigt.
- "Mapping ansehen" öffnet anschließend die Zuordnung.
- Bereits vereinheitlichte bzw. verbrauchte Ursprungstabellen werden nicht erneut in ein Mapping einbezogen.
  Dadurch entstehen keine wiederholten MERGE-Tabellen und keine 8 -> 12 -> 16 Datensatz-Kaskaden.
- Nach erfolgreichem Mapping wird nur die vereinheitlichte Ergebnistabelle weiterbearbeitet/exportiert.


v34:
- Schema-Mapping korrigiert: Inhalte aus System B werden jetzt wirklich in die Zielspalten von System A übernommen.
- Beispiel:
  Kunden_ID -> Kundennr
  Unternehmen -> Firma
  Postleitzahl -> PLZ
  Stadt -> Ort
  Mailadresse -> E-Mail
- Die Auswahl im Mapping-Dialog hat Vorrang; falls kein Mapping gewählt wurde, greift ein semantischer Fallback.
- Fehlerhafte Inhalte wie "91yyyy126" bleiben absichtlich erhalten und werden anschließend von der Datenqualitätsprüfung beanstandet.
- Nach dem Mapping wird die vereinheitlichte Tabelle automatisch erneut geprüft.
- Zusätzliche Mapping-Integritätsprüfung meldet, falls nach dem Mapping Pflichtfelder wie "Firma" leer geblieben sind.

v35:
- Schema-Mapping nochmals robuster gemacht.
- Auch fehlerhaft/importiert benannte Spalten wie "Unternehxxxxmen" werden als Firmen-/Unternehmensspalte erkannt.
- Mapping-Dialog und tatsächliche Zusammenführung verwenden jetzt dieselbe semantische Bewertungslogik.
- Sicherheitsnetz: bleibt die Zielspalte "Firma" trotz Mapping leer, erkennt DataCheck typische Firmenwerte (GmbH, AG, KG usw.) im Quelldatensatz und übernimmt sie.
- Ziel für das Testbeispiel:
  X2001 -> Firma "Müller Maschinenbau GmbH"
  X2002 -> Firma "Franken Technik GmbH"
  X2003 -> Firma "Elektro-Mayer GmbH"
  X2004 -> Firma "Werkzeug Service GmbH"
- Fehlerhafte PLZ wie "91yyyy126" bleibt bewusst erhalten und wird anschließend als Datenqualitätsfehler gemeldet.


v36:
- PLZ bereinigen wieder eingebaut.
- Ort bereinigen wieder eingebaut.
- Weitere Testfälle direkt auswählbar.
- E-Mail-Testfall mit 20 Datensätzen.
- PLZ/Ort-Deutschland-Testfall mit 20 Datensätzen und Dubletten.
- Kaputte CSV-Struktur als eigener Testfall.
- Kaputte XML-Struktur als eigener Testfall.
- Alte Testfälle weiterhin enthalten.


v37:
- Neuer Testfall "Werkzeuge & Hammer · Varianten".
- 20 Artikeldatensätze mit vielen Schreibweisen:
  Werkzeug / WERKZEUG / Werkzeuge / werkzeug / Werk-Zeug / WERKZEUGE
  Hammer 500g / Hammer 500 g / Hammer 500 G / HAMMER 500g / Hammer 500-Gramm / Hammer 500gr
  Schlosserhammer / Schlosser-Hammer
  Fäustel / Faeustel
  Gummihammer / Gummi-Hammer
  Latthammer / Lattenhammer
- Zusätzlich fehlende Warengruppe und fehlende Bezeichnung.
- Gedacht für Schreibvarianten, Vereinheitlichung "für alle", Dubletten und Golden-Record-Prüfung.
