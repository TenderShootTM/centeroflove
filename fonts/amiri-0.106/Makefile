.PHONY: all clean ttf web pack check

NAME=amiri
VERSION=0.106

TOOLS=tools
SRC=sources
WEB=webfonts
DOC=documentation
TESTS=test-suite
FONTS=$(NAME)-regular $(NAME)-quran $(NAME)-bold $(NAME)-slanted $(NAME)-boldslanted
DOCS=README README-Arabic NEWS NEWS-Arabic
DIST=$(NAME)-$(VERSION)

BUILD=$(TOOLS)/build.py
RUNTEST=$(TOOLS)/runtest.py
FF=python $(BUILD)
SFNTTOOL=sfnttool
PP=gpp +c "/*" "*/" +c "//" "\n" +c "\\\n" "" -I$(SRC)

SFDS=$(FONTS:%=$(SRC)/%.sfd)
DTTF=$(FONTS:%=%.ttf)
WTTF=$(FONTS:%=$(WEB)/%.ttf)
WOFF=$(FONTS:%=$(WEB)/%.woff)
EOTS=$(FONTS:%=$(WEB)/%.eot)
CSSS=$(WEB)/$(NAME).css
PDFS=$(DOC)/$(NAME)-table.pdf $(DOC)/documentation-arabic.pdf
FEAT=$(wildcard $(SRC)/*.fea)
TEST=$(wildcard $(TESTS)/*.test)
TEST+=$(wildcard $(TESTS)/*.ptest)

DOCFILES=$(DOCS:%=$(DOC)/%.txt)
license=OFL.txt OFL-FAQ.txt

all: ttf web

ttf: $(DTTF)
web: $(WTTF) $(WOFF) $(EOTS) $(CSSS)
doc: $(PDFS)

$(NAME)-quran.ttf: $(SRC)/$(NAME)-regular.sfd $(SRC)/crimson/Crimson-Roman.sfd $(SRC)/$(NAME).fea $(FEAT) $(BUILD)
	@echo "   FF\t$@"
	@$(PP) -DQURAN $(SRC)/$(NAME).fea -o $(SRC)/$(NAME)-quran.fea.pp
	@$(FF) --input $< --output $@ --features=$(SRC)/$(NAME)-quran.fea.pp --version $(VERSION) --quran

$(NAME)-regular.ttf: $(SRC)/$(NAME)-regular.sfd $(SRC)/crimson/Crimson-Roman.sfd $(SRC)/$(NAME).fea $(FEAT) $(BUILD)
	@echo "   FF\t$@"
	@$(PP) $(SRC)/$(NAME).fea -o $(SRC)/$(NAME)-regular.fea.pp
	@$(FF) --input $< --output $@ --features=$(SRC)/$(NAME)-regular.fea.pp --version $(VERSION)

$(NAME)-slanted.ttf: $(SRC)/$(NAME)-regular.sfd $(SRC)/crimson/Crimson-Italic.sfd $(SRC)/$(NAME).fea $(FEAT) $(BUILD)
	@echo "   FF\t$@"
	@$(PP) -DITALIC $(SRC)/$(NAME).fea -o $(SRC)/$(NAME)-slanted.fea.pp
	@$(FF) --input $< --output $@ --features=$(SRC)/$(NAME)-slanted.fea.pp --version $(VERSION) --slant=10

$(NAME)-bold.ttf: $(SRC)/$(NAME)-bold.sfd $(SRC)/crimson/Crimson-Bold.sfd $(SRC)/$(NAME).fea $(FEAT) $(BUILD)
	@echo "   FF\t$@"
	@$(PP) $(SRC)/$(NAME).fea -o $(SRC)/$(NAME)-bold.fea.pp
	@$(FF) --input $< --output $@ --features=$(SRC)/$(NAME)-bold.fea.pp --version $(VERSION)

$(NAME)-boldslanted.ttf: $(SRC)/$(NAME)-bold.sfd $(SRC)/crimson/Crimson-BoldItalic.sfd $(SRC)/$(NAME).fea $(FEAT) $(BUILD)
	@echo "   FF\t$@"
	@$(PP) -DITALIC $(SRC)/$(NAME).fea -o $(SRC)/$(NAME)-boldslanted.fea.pp
	@$(FF) --input $< --output $@ --features=$(SRC)/$(NAME)-boldslanted.fea.pp --version $(VERSION) --slant=10

$(WEB)/%.ttf: %.ttf $(BUILD)
	@echo "   FF\t$@"
	@mkdir -p $(WEB)
	@$(FF) --input $< --output $@ --web 1>/dev/null 2>&1

$(WEB)/%.woff: $(WEB)/%.ttf
	@echo "   FF\t$@"
	@mkdir -p $(WEB)
	@$(SFNTTOOL) -w $< $@

$(WEB)/%.eot: $(WEB)/%.ttf
	@echo "   FF\t$@"
	@mkdir -p $(WEB)
	@$(SFNTTOOL) -e -x $< $@

$(WEB)/%.css: $(WTTF) $(BUILD)
	@echo "   GEN\t$@"
	@mkdir -p $(WEB)
	@$(FF) --css --input "$(WTTF)" --output $@ --version $(VERSION)

$(DOC)/$(NAME)-table.pdf: $(NAME)-regular.ttf
	@echo "   GEN\t$@"
	@mkdir -p $(DOC)
	@fntsample --font-file $< --output-file $@.tmp --print-outline > $@.txt
	@pdfoutline $@.tmp $@.txt $@
	@rm -f $@.tmp $@.txt

$(DOC)/documentation-arabic.pdf: $(DOC)/documentation-sources/documentation-arabic.tex
	@echo "   GEN\t$@"
	@latexmk --norc --xelatex --quiet --output-directory=${DOC} $<

check: $(TEST) $(DTTF)
ifeq ($(shell which hb-shape),)
	@echo "hb-shape not found, skipping tests"
else
	@echo "running tests"
	@$(RUNTEST) $(TEST)
endif

clean:
	rm -rfv $(DTTF) $(WTTF) $(WOFF) $(EOTS) $(CSSS) $(PDFS) $(SRC)/$(NAME).fea.pp
	rm -rfv $(DOC)/documentation-arabic.{aux,log,toc}

