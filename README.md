Con l'utilizzo di laravel fortify ho voluto implementare oltre al nome, la mail e la password, anche la foto del profilo (in alternativa all'inserimento dell'immagine per ogni articolo, voglio che si visualizzi l'immagine profilo di chi lo ha creato). Per farlo ho usato la documentazione presente online. Oltre al sito di laravel, ho consultato forum online e ho usato chatGpt per farmi spiegare nel dettaglio alcuni passaggi.

Ecco i passaggi che ho eseguito: 
1- ho creato la migrazione che mi ha aggiunto una colonna relativa alle immagini del profilo nella table del database
2- ho creato un controller di registrazione personalizzato che include anche l'inserimento della foto profilo. L'ho costruito con l'aiuto di chatGPT seguendo ogni passaggio: validazione dei dati, caricamento della profile pic, creazione ed autenticazione automatica dell'utente.
3- infine, ho creato delle rotte personalizzate relative al nuovo controller e le ho inserite nella vista register.


