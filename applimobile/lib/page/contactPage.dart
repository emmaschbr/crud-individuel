import 'package:flutter/material.dart';

class ContactScreen extends StatefulWidget {
  @override
  ContactPage createState() => ContactPage();
}

class ContactPage extends State<ContactScreen> {
  late TextEditingController _controller;

  @override
  void initState() {
    super.initState();
    _controller = TextEditingController();
  }

  @override
  void dispose() {
    _controller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    final ButtonStyle style =
        ElevatedButton.styleFrom(textStyle: const TextStyle(fontSize: 20));
    return Scaffold(
        body: Center(
          child: Container(
              child: Align(
                alignment: Alignment.topLeft,
                child: Column(
                  children: [
                    Padding(padding: EdgeInsets.fromLTRB(20, 20, 20, 20),
                        child: Text('Contact', style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold))
                    ),
                    SizedBox(height: 10),
                    Container(
                      width: 100,
                      child: TextField(
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Email',
                          )),
                    ),
                    SizedBox(height: 10),
                    Container(
                      width: 100,
                      child: TextField(
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Objet',
                          )),
                    ),
                    SizedBox(height: 10),
                    ElevatedButton(
                      style: style,
                      onPressed: () {},
                      child: const Text('Joindre un fichier'),
                    ),
                    SizedBox(height: 10),
                    Container(
                      width: 300,
                      child: TextField(
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Message',
                          )),
                    ),
                    SizedBox(height: 10),
                    ElevatedButton(
                      style: style,
                      onPressed: () {},
                      child: const Text('Envoyer'),
                    ),
                  ],
                ),
              )
          ),
        ));
  }
}
