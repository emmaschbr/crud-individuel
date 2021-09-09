class Client {
  final String nom;

  Client({required this.nom});

  factory Client.fromJson(Map<String, dynamic> json) {
    return Client(nom: json['nom']);
  }
  Map<String, dynamic> toJson() => {
    'nom': nom,
  };
}