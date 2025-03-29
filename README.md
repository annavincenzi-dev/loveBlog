Con l'utilizzo di laravel fortify ho voluto implementare oltre al nome, la mail e la password, anche la foto del profilo (in alternativa all'inserimento dell'immagine per ogni articolo, voglio che si visualizzi l'immagine profilo di chi lo ha creato). Per farlo ho usato la documentazione presente online. Oltre al sito di laravel, ho consultato forum online e ho usato chatGpt per farmi spiegare nel dettaglio alcuni passaggi.

Ecco i passaggi che ho eseguito: 
1- ho creato la migrazione che mi ha aggiunto una colonna relativa alle immagini del profilo nella table del database
2- ho creato un controller di registrazione personalizzato che include anche l'inserimento della foto profilo. L'ho costruito con l'aiuto di chatGPT seguendo ogni passaggio: validazione dei dati, caricamento della profile pic, creazione ed autenticazione automatica dell'utente.
3- infine, ho creato delle rotte personalizzate relative al nuovo controller e le ho inserite nella vista register.

Successivamente ho voluto collegare la foto profilo ad ogni storia scritta, in modo che all'apertura della pagina dettaglio si visualizzi la foto profilo dell'utente che ha scritto la storia. In modo simile, voglio che il nome dell'autore della storia (written_by) sia direttamente collegato all'utente loggato. Anche per questa feature ho utilizzato la documentazione e vari forum online, incontrando tutt'altro che poche difficoltà (a cui ho rimediato facendomi spiegare ogni passaggio da chat gpt). 

Alla fine, ecco i passaggi che ho eseguito:
- Ho creato una relazione tra la tabella stories e la tabella users. 
- Ho aggiunto ad ogni storia un campo user_id che farà riferimento all'ID dell'utente.
- Nella vista della storia, ho mostrato il nome dell'autore e la sua foto profilo, utilizzando il campo profile_photo dell'utente, con un'immagine avatar di default se non è presente.

Ho preferito modificare il nome della colonna 'author' prima presente nella table stories in 'written_by' per non confonderla con la relazione stories/users (chiamata appunto author).


