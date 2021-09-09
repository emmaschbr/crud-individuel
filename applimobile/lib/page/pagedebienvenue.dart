import 'contact.dart';
import 'package:flutter/material.dart';

class ContactList extends StatefulWidget {
  @override
  _ContactListState createState() => _ContactListState();
}

class _ContactListState extends State<ContactList> {
  List<Contact> contacts = [
    Contact(nom: 'Alexandre Clain', imageProfil: 'image-1.jpg'),
    Contact(nom: 'Eric Artigala', imageProfil: 'image-2.png'),
    Contact(nom: 'Nicolas ', imageProfil: 'image-3.jpg'),
    Contact(nom: 'Chritel Olame', imageProfil: 'image-5.jpg'),
    Contact(nom: 'Jonathan Bisimwa', imageProfil: 'image-6.jpg'),
    Contact(nom: 'Louise Aladin', imageProfil: 'image-4.jpg'),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Column(
          children: [
            Padding(padding: EdgeInsets.fromLTRB(20, 20, 20, 20),
                child: Text('Bienvenue', style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold))
            ),
            Expanded(child: Container(
                child:
                ListView.builder(
                    itemCount: contacts.length,
                    itemBuilder: (context, index) {
                      return Padding(
                        padding:
                        const EdgeInsets.symmetric(vertical: 0.0, horizontal: 4.0),
                        child: Card(
                          child: ListTile(
                            title: Text(contacts[index].nom,
                                style: Theme.of(context).textTheme.title),
                            leading: CircleAvatar(
                              backgroundColor: Colors.greenAccent,
                            ),
                          ),
                        ),
                      );
                    })
            ),)
          ]
        )
    );
  }
}
