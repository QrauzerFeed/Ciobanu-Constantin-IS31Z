let macData = {
  "greutatea": 4,
  "lungimea": "asdsa",
  "model": "asdasd"
}

class Macaraua {
  constructor(greutatea, lungimea, model) {
    this.greutatea = greutatea;
    this.lungimea = lungimea;
    this.model = model;
    this.greutateaContainer = 0;
  }

  load(weight) {
    this.greutateaContainer = this.greutateaContainer + weight;
  }

  unload(weight) {
    this.greutateaContainer = this.greutateaContainer - weight;
  }

  ridica(greutateaContainer) {
    this.greutateaContainer = greutateaContainer;
    this.greutatea < this.greutateaContainer
      ? console.log("Container este prea greu")
      : console.log("Container este miscat");
  }

  info() {
    return `
      greutatea = ${this.greutatea}
      lungimea = ${this.lungimea}
      model = ${this.model}
      greutateaContainer = ${this.greutateaContainer}
    `;
  }
  movevas() {}

  movedoc() {}
}

const mac = new Macaraua(macData.greutatea, macData.lungimea, macData.model);

let cont = [2, 3, 1, 7, 4];
let m = 0;
for (m; m < cont.length; m++) {
  mac.movevas();
  mac.ridica(cont[m]);
  if (cont[m] > mac.greutatea) m = cont.length;
  else mac.movedoc();
}
