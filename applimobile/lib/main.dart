import 'package:applimobile/page/clientPage.dart';
import 'package:applimobile/page/collabPage.dart';
import 'package:applimobile/page/formulaire.dart';
import 'package:flutter/material.dart';

import 'page/HomePage.dart';


void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(

        title: 'FACT 2 PDF',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          // This is the theme of your application.
          //
          // Try running your application with "flutter run". You'll see the
          // application has a blue toolbar. Then, without quitting the app, try
          // changing the primarySwatch below to Colors.green and then invoke
          // "hot reload" (press "r" in the console where you ran "flutter run",
          // or simply save your changes to "hot reload" in a Flutter IDE).
          // Notice that the counter didn't reset back to zero; the application
          // is not restarted.
          primarySwatch: Colors.green,
        ),
        routes: {
          '/':(context)=> HomeScreen(),
          '/client':(context)=> ClientScreen(),
          '/collaborateur':(context)=> CollabScreen(),
          '/formulaire':(context)=> Home(),

        },
      initialRoute: '/',
    );
  }
}


