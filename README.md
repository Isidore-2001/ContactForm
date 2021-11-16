# ContactForm

# Réalisation 

Pour réaliser ce projet on a installé Symfony 4 pour pouvoir ce qui nous a permis
d'avoir un MVC pour pouvoir concevoir l'application.

On dispose des **inputs** commme **nom**, **prenom**, **mail**, **message** permettant 
d'avoir les informations sur la personne qui envoie de message aux départements

# Enregistrements des données des départements 

Pour cela on a une base ayant pour colonne le nom du départements et le mail du département. 

Pour enregistrer les données on a utiliser la classe Fixture **AppFixture** .

# Envoi de mail aux départements 

Pour envoyer de mail aux différents départements on a utilisé la classe proposé par 
Symfony Swift_Mailer tout en configurant notre fichier **.env**. 

